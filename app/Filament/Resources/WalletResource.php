<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WalletResource\Pages;
use App\Filament\Resources\WalletResource\RelationManagers;
use App\Models\Wallet;
use App\Models\ExchangeRate;
use App\Models\WalletTransfer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification;
use Filament\Forms\Get;
use Filament\Forms\Set;

class WalletResource extends Resource
{
    protected static ?string $model = Wallet::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Financial');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Wallet Information'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label(__('Name'))
                            ->placeholder(__('e.g., Main Business Wallet'))
                            ->autocomplete(false),
                        Forms\Components\Select::make('currency')
                            ->required()
                            ->label(__('Currency'))
                            ->options([
                                'DZD' => 'DZD - Algerian Dinar',
                                'USD' => 'USD - US Dollar',
                                'EUR' => 'EUR - Euro',
                                'CNY' => 'CNY - Chinese Yuan',
                                'TRY' => 'TRY - Turkish Lira',
                                'AED' => 'AED - UAE Dirham',
                            ])
                            ->searchable()
                            ->native(false),
                        Forms\Components\TextInput::make('balance')
                            ->required()
                            ->numeric()
                            ->label(__('Balance'))
                            ->prefix(fn ($get) => $get('currency') ?? 'DZD')
                            ->minValue(0)
                            ->default(0.00)
                            ->step(0.01)
                            ->helperText(__('Initial balance for this wallet')),
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->label(__('Assigned To'))
                            ->helperText(__('Optional: Assign this wallet to a specific user')),
                        Forms\Components\Toggle::make('is_active')
                            ->label(__('Active'))
                            ->default(true),
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->label(__('Description'))
                            ->placeholder(__('Additional notes about this wallet'))
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label(__('Name'))
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('currency')
                    ->badge()
                    ->label(__('Currency'))
                    ->color(fn (string $state): string => match ($state) {
                        'DZD' => 'success',
                        'USD' => 'info',
                        'EUR' => 'warning',
                        'CNY' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('balance')
                    ->money(fn ($record) => $record->currency)
                    ->sortable()
                    ->label(__('Balance'))
                    ->weight('bold')
                    ->color(fn ($state) => $state > 0 ? 'success' : 'danger'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('Assigned To'))
                    ->sortable()
                    ->toggleable()
                    ->placeholder(__('Unassigned')),
                Tables\Columns\TextColumn::make('transactions_count')
                    ->counts('transactions')
                    ->badge()
                    ->color('info')
                    ->label(__('Transactions')),
                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('Active'))
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('Created At'))
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('currency')
                    ->options([
                        'DZD' => 'DZD',
                        'USD' => 'USD',
                        'EUR' => 'EUR',
                        'CNY' => 'CNY',
                        'TRY' => 'TRY',
                        'AED' => 'AED',
                    ])
                    ->label(__('Currency')),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('Active'))
                    ->boolean()
                    ->trueLabel(__('Active only'))
                    ->falseLabel(__('Inactive only'))
                    ->native(false),
                Tables\Filters\Filter::make('has_balance')
                    ->query(fn (Builder $query): Builder => $query->where('balance', '>', 0))
                    ->label(__('Has Balance'))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\Action::make('transfer')
                    ->label('Transfer')
                    ->icon('heroicon-o-arrow-right-circle')
                    ->color('primary')
                    ->form([
                        Forms\Components\Section::make('Transfer Details')
                            ->schema([
                                Forms\Components\Select::make('to_wallet_id')
                                    ->label('To Wallet')
                                    ->options(function ($record) {
                                        return Wallet::where('id', '!=', $record->id)
                                            ->where('is_active', true)
                                            ->get()
                                            ->mapWithKeys(fn($wallet) => [
                                                $wallet->id => $wallet->name . ' (' . $wallet->currency . ') - Balance: ' . number_format($wallet->balance, 2)
                                            ]);
                                    })
                                    ->required()
                                    ->searchable()
                                    ->native(false)
                                    ->live()
                                    ->afterStateUpdated(function (Get $get, Set $set) {
                                        $toWalletId = $get('to_wallet_id');
                                        if ($toWalletId) {
                                            $fromWallet = Wallet::find($get('from_wallet_id'));
                                            $toWallet = Wallet::find($toWalletId);
                                            if ($fromWallet && $toWallet) {
                                                // Get last used exchange rate for this currency pair
                                                $lastTransfer = WalletTransfer::where('from_currency', $fromWallet->currency)
                                                    ->where('to_currency', $toWallet->currency)
                                                    ->whereNotNull('exchange_rate')
                                                    ->latest()
                                                    ->first();

                                                $rate = $lastTransfer ? $lastTransfer->exchange_rate : ExchangeRate::getRate($fromWallet->currency, $toWallet->currency);

                                                if ($rate) {
                                                    $set('exchange_rate', $rate);
                                                    $amount = $get('from_amount');
                                                    if ($amount) {
                                                        $set('to_amount', round($amount * $rate, 2));
                                                    }
                                                }
                                            }
                                        }
                                    }),
                                Forms\Components\Hidden::make('from_wallet_id')
                                    ->default(fn ($record) => $record->id),
                            ]),

                        Forms\Components\Section::make('Amount')
                            ->schema([
                                Forms\Components\TextInput::make('from_amount')
                                    ->label(fn ($record) => 'Amount to Transfer (' . $record->currency . ')')
                                    ->required()
                                    ->numeric()
                                    ->minValue(0.01)
                                    ->maxValue(fn ($record) => $record->balance)
                                    ->step(0.01)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                        $rate = $get('exchange_rate');
                                        if ($state && $rate) {
                                            $set('to_amount', round($state * $rate, 2));
                                        }
                                    })
                                    ->helperText(fn ($record) => 'Available balance: ' . number_format($record->balance, 2) . ' ' . $record->currency),
                            ]),

                        Forms\Components\Section::make('Exchange Rate & Conversion')
                            ->schema([
                                Forms\Components\TextInput::make('exchange_rate')
                                    ->label(function (Get $get) {
                                        $fromWallet = Wallet::find($get('from_wallet_id'));
                                        $toWallet = Wallet::find($get('to_wallet_id'));

                                        if ($fromWallet && $toWallet) {
                                            return 'Exchange Rate (1 ' . $fromWallet->currency . ' = ? ' . $toWallet->currency . ')';
                                        }

                                        return 'Exchange Rate';
                                    })
                                    ->required()
                                    ->numeric()
                                    ->minValue(0.00000001)
                                    ->step(0.00000001)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                        $amount = $get('from_amount');
                                        if ($state && $amount) {
                                            $set('to_amount', round($amount * $state, 2));
                                        }
                                    })
                                    ->helperText('Last used rate auto-filled. You can edit it.')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('to_amount')
                                    ->label(function (Get $get) {
                                        $toWallet = Wallet::find($get('to_wallet_id'));
                                        return $toWallet ? 'Amount to be Credited (' . $toWallet->currency . ')' : 'Amount to be Credited';
                                    })
                                    ->required()
                                    ->numeric()
                                    ->disabled()
                                    ->dehydrated()
                                    ->helperText('Auto-calculated from amount × exchange rate')
                                    ->columnSpan(1),
                            ])
                            ->columns(2)
                            ->visible(fn (Get $get) => $get('to_wallet_id') !== null),

                        Forms\Components\Section::make('Additional Information')
                            ->schema([
                                Forms\Components\Textarea::make('description')
                                    ->label('Description')
                                    ->rows(3)
                                    ->placeholder('Optional: Add a note about this transfer'),
                            ]),
                    ])
                    ->action(function (array $data, $record) {
                        $fromWallet = $record;
                        $toWallet = Wallet::find($data['to_wallet_id']);

                        // Validate balance
                        if ($fromWallet->balance < $data['from_amount']) {
                            Notification::make()
                                ->danger()
                                ->title('Insufficient Balance')
                                ->body('The source wallet does not have enough balance for this transfer.')
                                ->send();
                            return;
                        }

                        // Use exchange rate from form
                        $rate = $data['exchange_rate'];
                        $toAmount = $data['to_amount'];

                        // Create transfer record
                        $transfer = WalletTransfer::create([
                            'from_wallet_id' => $fromWallet->id,
                            'from_amount' => $data['from_amount'],
                            'from_currency' => $fromWallet->currency,
                            'to_wallet_id' => $toWallet->id,
                            'to_amount' => $toAmount,
                            'to_currency' => $toWallet->currency,
                            'exchange_rate' => $rate,
                            'exchange_rate_id' => null, // No longer needed
                            'description' => $data['description'] ?? null,
                            'status' => 'pending',
                            'created_by' => auth()->id(),
                        ]);

                        // Auto-approve and execute transfer
                        try {
                            $transfer->approve(auth()->id());

                            Notification::make()
                                ->success()
                                ->title('Transfer Completed')
                                ->body('Successfully transferred ' . number_format($data['from_amount'], 2) . ' ' . $fromWallet->currency . ' to ' . $toWallet->name)
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->danger()
                                ->title('Transfer Failed')
                                ->body($e->getMessage())
                                ->send();
                        }
                    })
                    ->modalWidth('3xl')
                    ->modalHeading(fn ($record) => 'Transfer from ' . $record->name)
                    ->modalSubmitActionLabel('Transfer'),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\TransactionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWallets::route('/'),
            'create' => Pages\CreateWallet::route('/create'),
            'edit' => Pages\EditWallet::route('/{record}/edit'),
        ];
    }
}
