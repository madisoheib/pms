<?php

namespace App\Filament\Pages;

use App\Models\Wallet;
use App\Models\WalletTransfer;
use App\Models\ExchangeRate;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class TransferMoney extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';

    protected static string $view = 'filament.pages.transfer-money';

    protected static ?string $title = 'Transfer Money';

    protected static ?string $navigationLabel = 'Transfer Money';

    protected static ?string $slug = 'transfer-money';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationGroup = 'Financial';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Transfer Details')
                    ->description('Transfer money between wallets with automatic currency conversion')
                    ->schema([
                        Forms\Components\Select::make('from_wallet_id')
                            ->label('From Wallet')
                            ->options(function () {
                                return Wallet::all()->mapWithKeys(function ($wallet) {
                                    return [$wallet->id => "{$wallet->name} - {$wallet->currency} (Balance: " . number_format($wallet->balance, 2) . ")"];
                                });
                            })
                            ->required()
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(fn ($state) => $this->updateExchangeRate()),

                        Forms\Components\Select::make('to_wallet_id')
                            ->label('To Wallet')
                            ->options(function () {
                                return Wallet::all()->mapWithKeys(function ($wallet) {
                                    return [$wallet->id => "{$wallet->name} - {$wallet->currency} (Balance: " . number_format($wallet->balance, 2) . ")"];
                                });
                            })
                            ->required()
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(fn ($state) => $this->updateExchangeRate()),

                        Forms\Components\TextInput::make('amount')
                            ->label('Amount')
                            ->numeric()
                            ->required()
                            ->minValue(0.01)
                            ->reactive()
                            ->afterStateUpdated(fn ($state) => $this->calculateConvertedAmount())
                            ->prefix(fn ($get) => $get('from_wallet_id') ? Wallet::find($get('from_wallet_id'))?->currency : '$'),

                        Forms\Components\TextInput::make('exchange_rate')
                            ->label('Exchange Rate')
                            ->numeric()
                            ->required()
                            ->minValue(0.0001)
                            ->default(1)
                            ->reactive()
                            ->afterStateUpdated(fn ($state) => $this->calculateConvertedAmount())
                            ->helperText(fn ($get) => $this->getExchangeRateHelperText($get))
                            ->visible(fn ($get) => $this->needsExchangeRate($get)),

                        Forms\Components\Placeholder::make('converted_amount')
                            ->label('Amount to Receive')
                            ->content(fn ($get) => $this->getConvertedAmountDisplay($get))
                            ->visible(fn ($get) => $this->needsExchangeRate($get)),

                        Forms\Components\Textarea::make('notes')
                            ->label('Notes')
                            ->rows(3)
                            ->maxLength(500),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    protected function updateExchangeRate(): void
    {
        $fromWalletId = $this->data['from_wallet_id'] ?? null;
        $toWalletId = $this->data['to_wallet_id'] ?? null;

        if ($fromWalletId && $toWalletId) {
            $fromWallet = Wallet::find($fromWalletId);
            $toWallet = Wallet::find($toWalletId);

            if ($fromWallet && $toWallet) {
                if ($fromWallet->currency === $toWallet->currency) {
                    $this->data['exchange_rate'] = 1;
                } else {
                    // Try to find exchange rate
                    $exchangeRate = ExchangeRate::where('from_currency', $fromWallet->currency)
                        ->where('to_currency', $toWallet->currency)
                        ->where('is_active', true)
                        ->first();

                    if ($exchangeRate) {
                        $this->data['exchange_rate'] = $exchangeRate->rate;
                    } else {
                        // Try reverse rate
                        $reverseRate = ExchangeRate::where('from_currency', $toWallet->currency)
                            ->where('to_currency', $fromWallet->currency)
                            ->where('is_active', true)
                            ->first();

                        if ($reverseRate) {
                            $this->data['exchange_rate'] = 1 / $reverseRate->rate;
                        } else {
                            $this->data['exchange_rate'] = 1;
                        }
                    }
                }
            }
        }

        $this->calculateConvertedAmount();
    }

    protected function calculateConvertedAmount(): void
    {
        $amount = $this->data['amount'] ?? 0;
        $rate = $this->data['exchange_rate'] ?? 1;

        $this->data['converted_amount'] = $amount * $rate;
    }

    protected function needsExchangeRate($get): bool
    {
        $fromWalletId = $get('from_wallet_id');
        $toWalletId = $get('to_wallet_id');

        if (!$fromWalletId || !$toWalletId) {
            return false;
        }

        $fromWallet = Wallet::find($fromWalletId);
        $toWallet = Wallet::find($toWalletId);

        return $fromWallet && $toWallet && $fromWallet->currency !== $toWallet->currency;
    }

    protected function getExchangeRateHelperText($get): string
    {
        $fromWalletId = $get('from_wallet_id');
        $toWalletId = $get('to_wallet_id');

        if (!$fromWalletId || !$toWalletId) {
            return '';
        }

        $fromWallet = Wallet::find($fromWalletId);
        $toWallet = Wallet::find($toWalletId);

        if ($fromWallet && $toWallet) {
            return "1 {$fromWallet->currency} = {$get('exchange_rate')} {$toWallet->currency}";
        }

        return '';
    }

    protected function getConvertedAmountDisplay($get): string
    {
        $amount = $get('amount') ?? 0;
        $rate = $get('exchange_rate') ?? 1;
        $toWalletId = $get('to_wallet_id');

        if (!$toWalletId) {
            return '0.00';
        }

        $toWallet = Wallet::find($toWalletId);
        $convertedAmount = $amount * $rate;

        return $toWallet ? "{$toWallet->currency} " . number_format($convertedAmount, 2) : number_format($convertedAmount, 2);
    }

    public function transfer(): void
    {
        $data = $this->form->getState();

        try {
            DB::beginTransaction();

            $fromWallet = Wallet::find($data['from_wallet_id']);
            $toWallet = Wallet::find($data['to_wallet_id']);

            if ($fromWallet->balance < $data['amount']) {
                Notification::make()
                    ->title('Insufficient Balance')
                    ->body('The source wallet does not have enough balance for this transfer.')
                    ->danger()
                    ->send();
                return;
            }

            // Create transfer record
            $transfer = WalletTransfer::create([
                'from_wallet_id' => $data['from_wallet_id'],
                'to_wallet_id' => $data['to_wallet_id'],
                'amount' => $data['amount'],
                'from_currency' => $fromWallet->currency,
                'to_currency' => $toWallet->currency,
                'exchange_rate' => $data['exchange_rate'] ?? 1,
                'converted_amount' => $data['amount'] * ($data['exchange_rate'] ?? 1),
                'status' => 'pending',
                'notes' => $data['notes'] ?? null,
            ]);

            // Approve transfer immediately
            $transfer->approve();

            DB::commit();

            Notification::make()
                ->title('Transfer Successful')
                ->body("Successfully transferred {$fromWallet->currency} " . number_format($data['amount'], 2) . " from {$fromWallet->name} to {$toWallet->name}")
                ->success()
                ->send();

            // Reset form
            $this->form->fill();

        } catch (\Exception $e) {
            DB::rollBack();

            Notification::make()
                ->title('Transfer Failed')
                ->body('An error occurred during the transfer: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false; // Hide from main navigation as it's accessed from dashboard
    }
}