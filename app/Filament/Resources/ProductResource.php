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
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Section::make(__('Product Information'))
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255)
                                            ->label(__('Name'))
                                            ->autocomplete(false)
                                            ->reactive()
                                            ->columnSpan(2),
                                        Forms\Components\TextInput::make('sku')
                                            ->label(__('SKU'))
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(255)
                                            ->default(function () {
                                                $lastProduct = \App\Models\Product::orderBy('id', 'desc')->first();
                                                $nextId = $lastProduct ? $lastProduct->id + 1 : 1;
                                                $year = date('Y');
                                                return sprintf('PRD-%s-%05d', $year, $nextId);
                                            })
                                            ->helperText(__('Auto-generated SKU'))
                                            ->reactive(),
                                        Forms\Components\Select::make('category_id')
                                            ->relationship('category', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->label(__('Category'))
                                            ->reactive()
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
                                            ->step(0.01)
                                            ->reactive(),
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
                                            ->reactive()
                                            ->placeholder(__('Select country')),
                                        Forms\Components\TextInput::make('stock_quantity')
                                            ->label(__('Stock Quantity'))
                                            ->required()
                                            ->numeric()
                                            ->minValue(0)
                                            ->default(0)
                                            ->reactive()
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
                            ])
                            ->columnSpan(['lg' => 2]),

                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Section::make(__('QR Code Preview'))
                                    ->schema([
                                        Forms\Components\Placeholder::make('qr_preview')
                                            ->label('')
                                            ->content(function ($get) {
                                                $name = $get('name') ?? '';
                                                $sku = $get('sku') ?? '';
                                                $price = $get('price_per_unit') ?? 0;

                                                if (empty($name) && empty($sku)) {
                                                    return new \Illuminate\Support\HtmlString('<div class="text-center text-gray-500">Enter product details to generate QR code</div>');
                                                }

                                                $qrData = json_encode([
                                                    'sku' => $sku,
                                                    'name' => $name,
                                                    'price' => $price,
                                                ]);

                                                // Generate a simple QR code URL using a public API
                                                $qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' . urlencode($qrData);

                                                return new \Illuminate\Support\HtmlString('
                                                    <div class="text-center space-y-4">
                                                        <img src="' . $qrUrl . '" alt="QR Code" class="mx-auto rounded-lg shadow-sm" />
                                                        <div class="text-sm">
                                                            <p class="font-semibold text-gray-900 dark:text-white">' . e($name ?: 'Product Name') . '</p>
                                                            <p class="text-gray-600 dark:text-gray-400">SKU: ' . e($sku ?: 'Auto-generated') . '</p>
                                                            <p class="text-gray-600 dark:text-gray-400">Price: DZD ' . number_format($price, 2) . '</p>
                                                        </div>
                                                        <button type="button" onclick="window.print()" class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors">
                                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                                            </svg>
                                                            Print QR
                                                        </button>
                                                    </div>
                                                ');
                                            }),
                                    ])
                                    ->visible(fn ($get) => !empty($get('name')) || !empty($get('sku'))),
                            ])
                            ->columnSpan(['lg' => 1]),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo_path')
                    ->label(__('Image'))
                    ->circular()
                    ->defaultImageUrl(url('/images/placeholder.svg')),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
