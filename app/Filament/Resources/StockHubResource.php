<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StockHubResource\Pages;
use App\Filament\Resources\StockHubResource\RelationManagers;
use App\Models\StockHub;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StockHubResource extends Resource
{
    protected static ?string $model = StockHub::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Inventory');
    }

    public static function getNavigationLabel(): string
    {
        return __('Stock Hubs');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Hub Information'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label(__('Name'))
                            ->placeholder(__('e.g., Main Warehouse Algeria'))
                            ->autocomplete(false),
                        Forms\Components\TextInput::make('location')
                            ->required()
                            ->maxLength(255)
                            ->label(__('Location'))
                            ->placeholder(__('e.g., Algiers'))
                            ->autocomplete(false),
                        Forms\Components\Textarea::make('address')
                            ->rows(3)
                            ->label(__('Address'))
                            ->placeholder(__('Full address of the warehouse'))
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_active')
                            ->label(__('Active'))
                            ->default(true)
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
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->sortable()
                    ->label(__('Location'))
                    ->icon('heroicon-m-map-pin'),
                Tables\Columns\TextColumn::make('stock_count')
                    ->counts('stock')
                    ->label(__('Products'))
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('orders_count')
                    ->counts('orders')
                    ->label(__('Orders'))
                    ->badge()
                    ->color('success'),
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
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('Active'))
                    ->boolean()
                    ->trueLabel(__('Active only'))
                    ->falseLabel(__('Inactive only'))
                    ->native(false),
            ])
            ->actions([
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStockHubs::route('/'),
            'create' => Pages\CreateStockHub::route('/create'),
            'edit' => Pages\EditStockHub::route('/{record}/edit'),
        ];
    }
}
