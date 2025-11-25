<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Stock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class SaleResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Sales & Invoices');
    }

    public static function getNavigationLabel(): string
    {
        return __('Sales');
    }

    public static function getPluralLabel(): string
    {
        return __('Sales');
    }

    public static function getLabel(): string
    {
        return __('Sale');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Sale Information'))
                    ->schema([
                        Forms\Components\TextInput::make('invoice_number')
                            ->label(__('Sale Number'))
                            ->disabled()
                            ->dehydrated(false)
                            ->placeholder(__('Auto-generated'))
                            ->helperText(__('Sale number will be generated automatically')),
                        Forms\Components\Select::make('client_id')
                            ->relationship('client', 'name')
                            ->searchable()
                            ->required()
                            ->preload()
                            ->label(__('Client'))
                            ->columnSpan(2),
                    ])
                    ->columns(3),

                Forms\Components\Section::make(__('Stock & Payment'))
                    ->schema([
                        Forms\Components\Select::make('stock_hub_id')
                            ->relationship('stockHub', 'name')
                            ->searchable()
                            ->required()
                            ->preload()
                            ->label(__('Stock Hub'))
                            ->helperText(__('Products will be deducted from this stock hub')),
                        Forms\Components\Select::make('wallet_id')
                            ->relationship('wallet', 'name')
                            ->searchable()
                            ->required()
                            ->preload()
                            ->label(__('Payment Wallet'))
                            ->helperText(__('Wallet that will receive the payment'))
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->name . ' (' . $record->currency . ') - Balance: ' . number_format($record->balance, 2)),
                    ])
                    ->columns(2),

                Forms\Components\Section::make(__('Sale Items'))
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->options(fn () => Product::query()->pluck('name', 'id'))
                                    ->searchable()
                                    ->required()
                                    ->label(__('Product'))
                                    ->columnSpan(2)
                                    ->live()
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        if ($state) {
                                            $product = Product::find($state);
                                            if ($product) {
                                                // You can set a default price from product if you have it
                                                // $set('unit_price', $product->price);
                                            }
                                        }
                                    }),
                                Forms\Components\TextInput::make('quantity')
                                    ->required()
                                    ->numeric()
                                    ->minValue(1)
                                    ->label(__('Quantity'))
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        $unitPrice = $get('unit_price');
                                        if ($state && $unitPrice) {
                                            $set('subtotal', $state * $unitPrice);
                                        }
                                    }),
                                Forms\Components\TextInput::make('unit_price')
                                    ->required()
                                    ->numeric()
                                    ->minValue(0)
                                    ->label(__('Unit Price'))
                                    ->prefix('DZD')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        $quantity = $get('quantity');
                                        if ($state && $quantity) {
                                            $set('subtotal', $state * $quantity);
                                        }
                                    }),
                                Forms\Components\TextInput::make('subtotal')
                                    ->required()
                                    ->numeric()
                                    ->label(__('Subtotal'))
                                    ->prefix('DZD')
                                    ->disabled()
                                    ->dehydrated(),
                                Forms\Components\Textarea::make('notes')
                                    ->label(__('Item Notes'))
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ])
                            ->columns(4)
                            ->defaultItems(1)
                            ->addActionLabel(__('Add Another Product'))
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string =>
                                isset($state['product_id']) && $state['product_id']
                                    ? Product::find($state['product_id'])?->name ?? __('Product Item')
                                    : __('New Item')
                            )
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make(__('Pricing'))
                    ->schema([
                        Forms\Components\TextInput::make('subtotal')
                            ->required()
                            ->numeric()
                            ->label(__('Subtotal'))
                            ->prefix('DZD')
                            ->helperText(__('Calculate from all items')),
                        Forms\Components\TextInput::make('tax_amount')
                            ->numeric()
                            ->default(0)
                            ->label(__('Tax Amount'))
                            ->prefix('DZD'),
                        Forms\Components\TextInput::make('discount_amount')
                            ->numeric()
                            ->default(0)
                            ->label(__('Discount Amount'))
                            ->prefix('DZD'),
                        Forms\Components\TextInput::make('total_amount')
                            ->required()
                            ->numeric()
                            ->label(__('Total Amount'))
                            ->prefix('DZD')
                            ->helperText(__('Subtotal + Tax - Discount')),
                    ])
                    ->columns(4),

                Forms\Components\Section::make(__('Dates'))
                    ->schema([
                        Forms\Components\DatePicker::make('invoice_date')
                            ->label(__('Sale Date'))
                            ->default(now())
                            ->required()
                            ->native(false),
                        Forms\Components\DatePicker::make('due_date')
                            ->label(__('Due Date'))
                            ->native(false)
                            ->helperText(__('Payment due date (optional)')),
                    ])
                    ->columns(2),

                Forms\Components\Section::make(__('Additional Information'))
                    ->schema([
                        Forms\Components\Textarea::make('notes')
                            ->label(__('Notes'))
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice_number')
                    ->label(__('Sale #'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->copyable()
                    ->copyMessage(__('Sale number copied')),
                Tables\Columns\TextColumn::make('client.name')
                    ->label(__('Client'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'info',
                        'paid' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label(__('Total'))
                    ->money('DZD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('wallet.name')
                    ->label(__('Wallet'))
                    ->badge()
                    ->color('success')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('stockHub.name')
                    ->label(__('Stock Hub'))
                    ->badge()
                    ->color('info')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('invoice_date')
                    ->label(__('Sale Date'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->label(__('Due Date'))
                    ->date()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => __('Pending'),
                        'confirmed' => __('Confirmed'),
                        'paid' => __('Paid'),
                        'cancelled' => __('Cancelled'),
                    ])
                    ->multiple()
                    ->label(__('Status')),
                Tables\Filters\SelectFilter::make('client_id')
                    ->relationship('client', 'name')
                    ->searchable()
                    ->preload()
                    ->label(__('Client')),
                Tables\Filters\SelectFilter::make('stock_hub_id')
                    ->relationship('stockHub', 'name')
                    ->searchable()
                    ->preload()
                    ->label(__('Stock Hub')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->visible(fn (Sale $record): bool => $record->isPending()),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('confirm')
                        ->label(__('Confirm Sale'))
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading(__('Confirm Sale'))
                        ->modalDescription(__('This will deduct stock, credit the wallet, and calculate earnings. This action cannot be undone.'))
                        ->visible(fn (Sale $record): bool => $record->isPending())
                        ->action(function (Sale $record) {
                            try {
                                $record->confirm();
                                Notification::make()
                                    ->success()
                                    ->title(__('Sale Confirmed'))
                                    ->body(__('Stock deducted, wallet credited, and earnings calculated successfully'))
                                    ->send();
                            } catch (\Exception $e) {
                                Notification::make()
                                    ->danger()
                                    ->title(__('Error'))
                                    ->body($e->getMessage())
                                    ->send();
                            }
                        }),
                    Tables\Actions\Action::make('mark_paid')
                        ->label(__('Mark as Paid'))
                        ->icon('heroicon-o-currency-dollar')
                        ->color('success')
                        ->requiresConfirmation()
                        ->visible(fn (Sale $record): bool => $record->isConfirmed())
                        ->action(fn (Sale $record) => $record->markAsPaid()),
                    Tables\Actions\Action::make('cancel')
                        ->label(__('Cancel'))
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->visible(fn (Sale $record): bool => $record->isPending())
                        ->action(fn (Sale $record) => $record->cancel()),
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'view' => Pages\ViewSale::route('/{record}'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }
}
