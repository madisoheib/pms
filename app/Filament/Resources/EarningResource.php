<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EarningResource\Pages;
use App\Models\Earning;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EarningResource extends Resource
{
    protected static ?string $model = Earning::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Financial Management';

    protected static ?int $navigationSort = 4;

    public static function getNavigationLabel(): string
    {
        return __('Earnings');
    }

    public static function getModelLabel(): string
    {
        return __('Earning');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Earnings');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Earning Information'))
                    ->schema([
                        Forms\Components\Select::make('sale_id')
                            ->label(__('Sale'))
                            ->relationship('sale', 'sale_number')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->disabled(),

                        Forms\Components\Select::make('product_id')
                            ->label(__('Product'))
                            ->relationship('product', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->disabled(),

                        Forms\Components\TextInput::make('quantity')
                            ->label(__('Quantity'))
                            ->numeric()
                            ->required()
                            ->disabled(),

                        Forms\Components\TextInput::make('purchase_price')
                            ->label(__('Purchase Price'))
                            ->numeric()
                            ->prefix('$')
                            ->required()
                            ->disabled(),

                        Forms\Components\TextInput::make('sale_price')
                            ->label(__('Sale Price'))
                            ->numeric()
                            ->prefix('$')
                            ->required()
                            ->disabled(),

                        Forms\Components\TextInput::make('exchange_rate_difference')
                            ->label(__('Exchange Rate Difference'))
                            ->numeric()
                            ->prefix('$')
                            ->disabled(),

                        Forms\Components\TextInput::make('earning_amount')
                            ->label(__('Total Earning'))
                            ->numeric()
                            ->prefix('$')
                            ->required()
                            ->disabled(),

                        Forms\Components\Select::make('currency')
                            ->label(__('Currency'))
                            ->options([
                                'USD' => 'USD - US Dollar',
                                'EUR' => 'EUR - Euro',
                                'DZD' => 'DZD - Algerian Dinar',
                                'CNY' => 'CNY - Chinese Yuan',
                                'AED' => 'AED - UAE Dirham',
                            ])
                            ->required()
                            ->disabled(),

                        Forms\Components\Textarea::make('notes')
                            ->label(__('Notes'))
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sale.sale_number')
                    ->label(__('Sale'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('product.name')
                    ->label(__('Product'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('quantity')
                    ->label(__('Qty'))
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('purchase_price')
                    ->label(__('Buy Price'))
                    ->money('USD')
                    ->sortable(),

                Tables\Columns\TextColumn::make('sale_price')
                    ->label(__('Sell Price'))
                    ->money('USD')
                    ->sortable(),

                Tables\Columns\TextColumn::make('earning_amount')
                    ->label(__('Earning'))
                    ->money('USD')
                    ->sortable()
                    ->color(fn ($state) => $state > 0 ? 'success' : ($state < 0 ? 'danger' : 'gray')),

                Tables\Columns\TextColumn::make('currency')
                    ->label(__('Currency'))
                    ->badge(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Date'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_id')
                    ->label(__('Product'))
                    ->relationship('product', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('currency')
                    ->label(__('Currency'))
                    ->options([
                        'USD' => 'USD - US Dollar',
                        'EUR' => 'EUR - Euro',
                        'DZD' => 'DZD - Algerian Dinar',
                        'CNY' => 'CNY - Chinese Yuan',
                        'AED' => 'AED - UAE Dirham',
                    ]),

                Tables\Filters\Filter::make('positive_earnings')
                    ->label(__('Profitable'))
                    ->query(fn (Builder $query): Builder => $query->where('earning_amount', '>', 0)),

                Tables\Filters\Filter::make('negative_earnings')
                    ->label(__('Loss'))
                    ->query(fn (Builder $query): Builder => $query->where('earning_amount', '<', 0)),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label(__('From')),
                        Forms\Components\DatePicker::make('until')
                            ->label(__('Until')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // No bulk actions for earnings as they are auto-generated
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
            'index' => Pages\ListEarnings::route('/'),
            'view' => Pages\ViewEarning::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Earnings are auto-generated from sales
    }

    public static function canEdit($record): bool
    {
        return false; // Earnings should not be edited
    }

    public static function canDelete($record): bool
    {
        return false; // Earnings should not be deleted
    }
}