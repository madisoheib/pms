<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Orders & Transit');
    }

    public static function getNavigationLabel(): string
    {
        return __('Orders');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Order Information'))
                    ->schema([
                        Forms\Components\TextInput::make('order_number')
                            ->label(__('Order Number'))
                            ->disabled()
                            ->dehydrated(false)
                            ->placeholder(__('Auto-generated'))
                            ->helperText(__('Order number will be generated automatically')),
                    ])
                    ->columns(1),

                Forms\Components\Section::make(__('Order Items'))
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Forms\Components\Grid::make(12)
                                    ->schema([
                                        // Product Selection with Photo
                                        Forms\Components\Select::make('product_id')
                                            ->options(function () {
                                                return Product::query()
                                                    ->with('category')
                                                    ->get()
                                                    ->mapWithKeys(function ($product) {
                                                        return [$product->id => $product->name . ' (' . $product->sku . ')'];
                                                    });
                                            })
                                            ->searchable()
                                            ->required()
                                            ->label(__('Product'))
                                            ->helperText(__('Select a product or create a new one'))
                                            ->reactive()
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                if ($state) {
                                                    $product = Product::find($state);
                                                    if ($product) {
                                                        $set('product_details', $product);
                                                    }
                                                }
                                            })
                                            ->createOptionForm([
                                                Forms\Components\TextInput::make('name')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->label(__('Product Name')),
                                                Forms\Components\TextInput::make('sku')
                                                    ->label(__('SKU'))
                                                    ->default(function () {
                                                        $lastProduct = Product::orderBy('id', 'desc')->first();
                                                        $nextId = $lastProduct ? $lastProduct->id + 1 : 1;
                                                        return sprintf('PRD-%s-%05d', date('Y'), $nextId);
                                                    })
                                                    ->required(),
                                                Forms\Components\FileUpload::make('photo_path')
                                                    ->label(__('Product Photo'))
                                                    ->image()
                                                    ->imageEditor()
                                                    ->directory('products')
                                                    ->visibility('public'),
                                                Forms\Components\TextInput::make('price_per_unit')
                                                    ->label(__('Price'))
                                                    ->numeric()
                                                    ->prefix('DZD')
                                                    ->default(0)
                                                    ->required(),
                                                Forms\Components\TextInput::make('stock_quantity')
                                                    ->label(__('Initial Stock'))
                                                    ->numeric()
                                                    ->default(0)
                                                    ->required(),
                                                Forms\Components\Select::make('category_id')
                                                    ->label(__('Category'))
                                                    ->relationship('category', 'name')
                                                    ->createOptionForm([
                                                        Forms\Components\TextInput::make('name')
                                                            ->required()
                                                            ->label(__('Category Name')),
                                                    ]),
                                                Forms\Components\Select::make('country_origin')
                                                    ->label(__('Origin'))
                                                    ->options([
                                                        'China' => 'China',
                                                        'Turkey' => 'Turkey',
                                                        'UAE' => 'UAE',
                                                        'Algeria' => 'Algeria',
                                                        'Other' => 'Other',
                                                    ]),
                                            ])
                                            ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                                                return $action
                                                    ->modalHeading(__('Create New Product'))
                                                    ->modalWidth('lg')
                                                    ->modalButton(__('Create Product'));
                                            })
                                            ->columnSpan(4),

                                        // Product Photo Display
                                        Forms\Components\Placeholder::make('product_photo')
                                            ->label(__('Product Photo'))
                                            ->content(function ($get) {
                                                $productId = $get('product_id');
                                                if (!$productId) {
                                                    return new \Illuminate\Support\HtmlString('<div class="text-center text-gray-500 py-4">Select a product to see photo</div>');
                                                }

                                                $product = Product::find($productId);
                                                if ($product && $product->photo_path) {
                                                    $photoUrl = \Storage::url($product->photo_path);
                                                    return new \Illuminate\Support\HtmlString('
                                                        <div class="text-center">
                                                            <img src="' . $photoUrl . '" alt="' . e($product->name) . '" class="w-20 h-20 object-cover rounded-lg mx-auto" />
                                                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">' . e($product->name) . '</p>
                                                        </div>
                                                    ');
                                                } else {
                                                    return new \Illuminate\Support\HtmlString('
                                                        <div class="text-center">
                                                            <img src="/images/placeholder.svg" alt="No image" class="w-20 h-20 object-cover rounded-lg mx-auto" />
                                                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">No photo</p>
                                                        </div>
                                                    ');
                                                }
                                            })
                                            ->columnSpan(2),

                                        // Product QR Code
                                        Forms\Components\Placeholder::make('product_qr')
                                            ->label(__('QR Code'))
                                            ->content(function ($get) {
                                                $productId = $get('product_id');
                                                if (!$productId) {
                                                    return new \Illuminate\Support\HtmlString('<div class="text-center text-gray-500 py-4">Select a product to see QR</div>');
                                                }

                                                $product = Product::find($productId);
                                                if ($product) {
                                                    $qrData = json_encode([
                                                        'id' => $product->id,
                                                        'sku' => $product->sku,
                                                        'name' => $product->name,
                                                        'price' => $product->price_per_unit,
                                                    ]);

                                                    $qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=' . urlencode($qrData);

                                                    return new \Illuminate\Support\HtmlString('
                                                        <div class="text-center">
                                                            <img src="' . $qrUrl . '" alt="QR Code" class="mx-auto" />
                                                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">SKU: ' . e($product->sku) . '</p>
                                                        </div>
                                                    ');
                                                }

                                                return '';
                                            })
                                            ->columnSpan(2),

                                        // Quantity and Price Fields
                                        Forms\Components\TextInput::make('quantity')
                                            ->required()
                                            ->numeric()
                                            ->minValue(1)
                                            ->label(__('Quantity'))
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                                $subtotal = $get('subtotal');
                                                if ($state && $subtotal && $state > 0) {
                                                    $set('price_per_unit', $subtotal / $state);
                                                }
                                            })
                                            ->columnSpan(2),

                                        Forms\Components\TextInput::make('subtotal')
                                            ->required()
                                            ->numeric()
                                            ->minValue(0)
                                            ->label(__('Total Price'))
                                            ->prefix('DZD')
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                                $quantity = $get('quantity');
                                                if ($state && $quantity && $quantity > 0) {
                                                    $set('price_per_unit', $state / $quantity);
                                                }
                                            })
                                            ->columnSpan(2),

                                        Forms\Components\TextInput::make('price_per_unit')
                                            ->numeric()
                                            ->label(__('Price per Unit'))
                                            ->prefix('DZD')
                                            ->disabled()
                                            ->dehydrated()
                                            ->helperText(__('Auto-calculated'))
                                            ->columnSpan(2),

                                        // Product Details Display
                                        Forms\Components\Placeholder::make('product_info')
                                            ->label(__('Product Details'))
                                            ->content(function ($get) {
                                                $productId = $get('product_id');
                                                if (!$productId) {
                                                    return '';
                                                }

                                                $product = Product::find($productId);
                                                if ($product) {
                                                    return new \Illuminate\Support\HtmlString('
                                                        <div class="space-y-1 text-sm">
                                                            <p><span class="font-medium">Stock:</span> ' . $product->stock_quantity . ' units</p>
                                                            <p><span class="font-medium">Category:</span> ' . ($product->category?->name ?? 'N/A') . '</p>
                                                            <p><span class="font-medium">Origin:</span> ' . ($product->country_origin ?? 'N/A') . '</p>
                                                        </div>
                                                    ');
                                                }

                                                return '';
                                            })
                                            ->columnSpan(6),

                                        Forms\Components\Textarea::make('notes')
                                            ->label(__('Item Notes'))
                                            ->rows(2)
                                            ->columnSpan(6),

                                        // Upload Product Photo Section
                                        Forms\Components\Section::make(__('Upload Product Photo'))
                                            ->description(__('Upload a new photo for this product'))
                                            ->schema([
                                                Forms\Components\FileUpload::make('temp_product_photo')
                                                    ->label(__('New Product Photo'))
                                                    ->image()
                                                    ->imageEditor()
                                                    ->directory('products')
                                                    ->visibility('public')
                                                    ->helperText(__('Upload to update product photo'))
                                                    ->afterStateUpdated(function ($state, callable $set, $get) {
                                                        if ($state && $get('product_id')) {
                                                            $product = Product::find($get('product_id'));
                                                            if ($product) {
                                                                // Delete old photo if exists
                                                                if ($product->photo_path) {
                                                                    \Storage::delete($product->photo_path);
                                                                }
                                                                // Update product with new photo
                                                                $product->update(['photo_path' => $state]);

                                                                \Filament\Notifications\Notification::make()
                                                                    ->title(__('Photo updated'))
                                                                    ->body(__('Product photo has been updated successfully'))
                                                                    ->success()
                                                                    ->send();
                                                            }
                                                        }
                                                    })
                                                    ->visible(fn ($get) => !empty($get('product_id')))
                                            ])
                                            ->collapsed()
                                            ->columnSpan(12),
                                    ]),
                            ])
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

                Forms\Components\Section::make(__('Order Total'))
                    ->schema([
                        Forms\Components\TextInput::make('total_price')
                            ->required()
                            ->numeric()
                            ->label(__('Total Price'))
                            ->prefix('DZD')
                            ->helperText(__('Calculate total from all items'))
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Forms\Components\Section::make(__('Transit & Delivery Details'))
                    ->schema([
                        Forms\Components\TextInput::make('country_origin')
                            ->maxLength(255)
                            ->label(__('Country of Origin'))
                            ->placeholder(__('e.g., China, Turkey')),
                        Forms\Components\DatePicker::make('delivery_date_expected')
                            ->label(__('Expected Delivery Date'))
                            ->native(false),
                        Forms\Components\Select::make('stock_hub_id')
                            ->relationship('stockHub', 'name')
                            ->searchable()
                            ->preload()
                            ->label(__('Destination Hub')),
                    ])
                    ->columns(3),

                Forms\Components\Section::make(__('Business Partners'))
                    ->schema([
                        Forms\Components\Select::make('supplier_id')
                            ->relationship('supplier', 'name')
                            ->searchable()
                            ->preload()
                            ->label(__('Supplier')),
                        Forms\Components\Select::make('client_id')
                            ->relationship('client', 'name')
                            ->searchable()
                            ->preload()
                            ->label(__('Client (Optional)'))
                            ->helperText(__('Assign a client if this is a pre-sold order')),
                    ])
                    ->columns(2),

                Forms\Components\Section::make(__('Payment & Status'))
                    ->schema([
                        Forms\Components\Select::make('wallet_id')
                            ->relationship('wallet', 'name')
                            ->searchable()
                            ->preload()
                            ->label(__('Payment Wallet'))
                            ->helperText(__('Wallet to debit for this order')),
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => __('Pending'),
                                'in_transit' => __('In Transit'),
                                'received' => __('Received'),
                                'confirmed' => __('Confirmed'),
                            ])
                            ->default('pending')
                            ->required()
                            ->label(__('Status')),
                        Forms\Components\Textarea::make('notes')
                            ->rows(3)
                            ->columnSpanFull()
                            ->label(__('Notes'))
                            ->placeholder(__('Add any notes or special instructions')),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label(__('Order #'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->copyable()
                    ->copyMessage(__('Order number copied')),

                // Product Photos Column
                Tables\Columns\ViewColumn::make('product_images')
                    ->label(__('Products'))
                    ->view('filament.tables.columns.order-products'),

                Tables\Columns\TextColumn::make('items_count')
                    ->label(__('Qty'))
                    ->counts('items')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                Tables\Columns\TextColumn::make('items.product.name')
                    ->label(__('Product Names'))
                    ->listWithLineBreaks()
                    ->limitList(2)
                    ->expandableLimitedList()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'in_transit' => 'info',
                        'received' => 'success',
                        'confirmed' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state)))
                    ->sortable(),
                Tables\Columns\TextColumn::make('items.quantity')
                    ->label(__('Total Qty'))
                    ->sum('items', 'quantity')
                    ->numeric()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('total_price')
                    ->label(__('Total'))
                    ->money('DZD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier.name')
                    ->label(__('Supplier'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('client.name')
                    ->label(__('Client'))
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('stockHub.name')
                    ->label(__('Hub'))
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('delivery_date_expected')
                    ->label(__('Expected Delivery'))
                    ->date()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('country_origin')
                    ->label(__('Origin'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('createdBy.name')
                    ->label(__('Created By'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                        'in_transit' => __('In Transit'),
                        'received' => __('Received'),
                        'confirmed' => __('Confirmed'),
                    ])
                    ->multiple()
                    ->label(__('Status')),
                Tables\Filters\SelectFilter::make('supplier_id')
                    ->relationship('supplier', 'name')
                    ->searchable()
                    ->preload()
                    ->label(__('Supplier')),
                Tables\Filters\SelectFilter::make('stock_hub_id')
                    ->relationship('stockHub', 'name')
                    ->searchable()
                    ->preload()
                    ->label(__('Destination Hub')),
                Tables\Filters\Filter::make('has_client')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('client_id'))
                    ->label(__('Pre-sold Orders'))
                    ->toggle(),
                Tables\Filters\Filter::make('delivery_overdue')
                    ->query(fn (Builder $query): Builder =>
                        $query->where('delivery_date_expected', '<', now())
                            ->whereIn('status', ['pending', 'in_transit'])
                    )
                    ->label(__('Overdue Deliveries'))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('mark_in_transit')
                        ->label(__('Mark In Transit'))
                        ->icon('heroicon-o-truck')
                        ->color('info')
                        ->requiresConfirmation()
                        ->visible(fn (Order $record): bool => $record->isPending())
                        ->action(fn (Order $record) => $record->markAsInTransit()),
                    Tables\Actions\Action::make('mark_received')
                        ->label(__('Mark Received'))
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->visible(fn (Order $record): bool => $record->isInTransit())
                        ->action(fn (Order $record) => $record->markAsReceived()),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
