<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransitReceiptResource\Pages;
use App\Filament\Resources\TransitReceiptResource\RelationManagers;
use App\Models\TransitReceipt;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransitReceiptResource extends Resource
{
    protected static ?string $model = TransitReceipt::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Orders & Transit');
    }

    public static function getNavigationLabel(): string
    {
        return __('Transit Receipts');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Receipt Information'))
                    ->schema([
                        Forms\Components\Select::make('order_id')
                            ->relationship('order', 'order_number', fn (Builder $query) =>
                                $query->where('status', 'in_transit')
                                    ->whereDoesntHave('transitReceipt')
                            )
                            ->required()
                            ->searchable()
                            ->label(__('Order'))
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $order = \App\Models\Order::find($state);
                                    if ($order) {
                                        $set('quantity_expected', $order->quantity_expected);
                                    }
                                }
                            })
                            ->helperText(__('Only orders in transit without receipts are shown')),
                        Forms\Components\Placeholder::make('quantity_expected')
                            ->label(__('Expected Quantity'))
                            ->content(function (callable $get) {
                                $orderId = $get('order_id');
                                if (!$orderId) {
                                    return __('Select an order first');
                                }
                                $order = \App\Models\Order::find($orderId);
                                return $order ? $order->quantity_expected : 'N/A';
                            }),
                    ])
                    ->columns(2),

                Forms\Components\Section::make(__('Quantity Verification'))
                    ->schema([
                        Forms\Components\TextInput::make('quantity_received')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->label(__('Quantity Received'))
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                $orderId = $get('order_id');
                                if ($orderId && $state !== null) {
                                    $order = \App\Models\Order::find($orderId);
                                    if ($order) {
                                        $discrepancy = $order->quantity_expected - $state;
                                        $set('quantity_discrepancy', $discrepancy);
                                    }
                                }
                            })
                            ->helperText(__('Enter the actual quantity received')),
                        Forms\Components\TextInput::make('quantity_discrepancy')
                            ->label(__('Discrepancy'))
                            ->numeric()
                            ->disabled()
                            ->dehydrated()
                            ->helperText(__('Automatically calculated'))
                            ->suffix(fn (callable $get) => $get('quantity_discrepancy') > 0 ? __('Missing') : ($get('quantity_discrepancy') < 0 ? __('Extra') : __('Perfect'))),
                    ])
                    ->columns(2),

                Forms\Components\Section::make(__('Receipt Details'))
                    ->schema([
                        Forms\Components\DateTimePicker::make('received_at')
                            ->label(__('Received At'))
                            ->default(now())
                            ->required()
                            ->native(false),
                        Forms\Components\Textarea::make('notes')
                            ->rows(3)
                            ->label(__('Notes'))
                            ->placeholder(__('Add any notes about discrepancies, damages, or other observations'))
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order.order_number')
                    ->label(__('Order #'))
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('order.product.name')
                    ->label(__('Product'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order.stockHub.name')
                    ->label(__('Hub'))
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('quantity_received')
                    ->label(__('Received'))
                    ->numeric()
                    ->alignCenter()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity_discrepancy')
                    ->label(__('Discrepancy'))
                    ->numeric()
                    ->alignCenter()
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state > 0 => 'danger',
                        $state < 0 => 'warning',
                        default => 'success',
                    })
                    ->formatStateUsing(fn ($state) => match (true) {
                        $state > 0 => "-{$state}",
                        $state < 0 => '+' . abs($state),
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('received_at')
                    ->label(__('Received'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('receivedBy.name')
                    ->label(__('Received By'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('has_discrepancy')
                    ->query(fn (Builder $query): Builder =>
                        $query->where('quantity_discrepancy', '!=', 0)
                    )
                    ->label(__('With Discrepancies'))
                    ->toggle(),
                Tables\Filters\Filter::make('missing_items')
                    ->query(fn (Builder $query): Builder =>
                        $query->where('quantity_discrepancy', '>', 0)
                    )
                    ->label(__('Missing Items'))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->hidden(fn ($record) => $record->order->isConfirmed()),
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
            'index' => Pages\ListTransitReceipts::route('/'),
            'create' => Pages\CreateTransitReceipt::route('/create'),
            'edit' => Pages\EditTransitReceipt::route('/{record}/edit'),
        ];
    }
}
