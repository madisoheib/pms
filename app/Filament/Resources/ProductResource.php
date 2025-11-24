<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Product Management');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Product Information'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label(__('Name'))
                            ->autocomplete(false)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('sku')
                            ->label(__('SKU'))
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->placeholder(__('Auto-generated if empty'))
                            ->helperText(__('Leave blank to auto-generate')),
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->label(__('Category'))
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->label(__('Name')),
                                Forms\Components\Textarea::make('description')
                                    ->rows(3)
                                    ->label(__('Description')),
                            ]),
                        Forms\Components\FileUpload::make('photo_path')
                            ->label(__('Product Image'))
                            ->image()
                            ->imageEditor()
                            ->directory('products')
                            ->visibility('public')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label(__('Description'))
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make(__('Pricing & Stock'))
                    ->schema([
                        Forms\Components\TextInput::make('price_per_unit')
                            ->label(__('Price per Unit'))
                            ->required()
                            ->numeric()
                            ->prefix('DZD')
                            ->minValue(0)
                            ->default(0.00)
                            ->step(0.01),
                        Forms\Components\Select::make('country_origin')
                            ->label(__('Country of Origin'))
                            ->options([
                                'China' => 'China',
                                'Turkey' => 'Turkey',
                                'UAE' => 'UAE (Dubai)',
                                'Algeria' => 'Algeria',
                                'France' => 'France',
                                'Germany' => 'Germany',
                                'Italy' => 'Italy',
                                'Spain' => 'Spain',
                                'USA' => 'USA',
                                'Other' => 'Other',
                            ])
                            ->searchable()
                            ->placeholder(__('Select country')),
                        Forms\Components\TextInput::make('stock_quantity')
                            ->label(__('Stock Quantity'))
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->helperText(__('Current stock quantity')),
                        Forms\Components\TextInput::make('low_stock_threshold')
                            ->label(__('Low Stock Alert Threshold'))
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->default(10)
                            ->helperText(__('Alert when stock falls below this value')),
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
                Tables\Columns\ImageColumn::make('photo_path')
                    ->label(__('Image'))
                    ->circular()
                    ->defaultImageUrl(url('/images/placeholder.png')),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label(__('Name'))
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('sku')
                    ->label(__('SKU'))
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label(__('Category'))
                    ->sortable()
                    ->badge()
                    ->color('info')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('country_origin')
                    ->label(__('Origin'))
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('price_per_unit')
                    ->label(__('Price'))
                    ->money('DZD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock_quantity')
                    ->label(__('Stock'))
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color(fn ($record) => $record->isLowStock() ? 'danger' : 'success'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('Active'))
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label(__('Created At')),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->label(__('Category')),
                Tables\Filters\Filter::make('low_stock')
                    ->query(fn (Builder $query): Builder => $query->whereColumn('stock_quantity', '<=', 'low_stock_threshold'))
                    ->label(__('Low Stock Only'))
                    ->toggle(),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('Active'))
                    ->boolean()
                    ->trueLabel(__('Active only'))
                    ->falseLabel(__('Inactive only'))
                    ->native(false),
            ])
            ->actions([
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
