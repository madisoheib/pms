<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Wallet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Wizard;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\Auth;

class CreateOrder extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = OrderResource::class;

    protected function getSteps(): array
    {
        return [
            Wizard\Step::make('Products & Supplier')
                ->description('Select products and supplier for this order')
                ->icon('heroicon-o-cube')
                ->schema([
                    Forms\Components\Select::make('supplier_id')
                        ->options(fn () => \App\Models\Supplier::query()->pluck('name', 'id'))
                        ->searchable()
                        ->required()
                        ->label('Supplier')
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('email')
                                ->email()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('phone')
                                ->tel()
                                ->maxLength(20),
                            Forms\Components\Textarea::make('address')
                                ->rows(2),
                        ])
                        ->helperText('Who is supplying these products?'),

                    Forms\Components\Repeater::make('items')
                        ->label('Order Items')
                        ->schema([
                            Forms\Components\Select::make('product_id')
                                ->options(fn () => \App\Models\Product::query()->pluck('name', 'id'))
                                ->searchable()
                                ->required()
                                ->label('Product')
                                ->columnSpan(2)
                                ->live(),
                            Forms\Components\TextInput::make('quantity')
                                ->required()
                                ->numeric()
                                ->minValue(1)
                                ->label('Quantity')
                                ->live(onBlur: true)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $subtotal = $get('subtotal');
                                    if ($state && $subtotal && $state > 0) {
                                        $set('price_per_unit', $subtotal / $state);
                                    }
                                }),
                            Forms\Components\TextInput::make('subtotal')
                                ->required()
                                ->numeric()
                                ->minValue(0)
                                ->label('Total Price')
                                ->prefix('DZD')
                                ->live(onBlur: true)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $quantity = $get('quantity');
                                    if ($state && $quantity && $quantity > 0) {
                                        $set('price_per_unit', $state / $quantity);
                                    }
                                }),
                            Forms\Components\TextInput::make('price_per_unit')
                                ->numeric()
                                ->label('Price per Unit')
                                ->prefix('DZD')
                                ->disabled()
                                ->dehydrated()
                                ->helperText('Auto-calculated'),
                        ])
                        ->columns(4)
                        ->defaultItems(1)
                        ->addActionLabel('Add Another Product')
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string =>
                            isset($state['product_id']) && $state['product_id']
                                ? \App\Models\Product::find($state['product_id'])?->name ?? 'Product Item'
                                : 'New Item'
                        )
                        ->columnSpanFull(),
                ])
                ->columns(1),

            Wizard\Step::make('Transit & Delivery')
                ->description('Specify delivery information and client assignment')
                ->icon('heroicon-o-truck')
                ->schema([
                    Forms\Components\Section::make('Order Total')
                        ->schema([
                            Forms\Components\TextInput::make('total_price')
                                ->required()
                                ->numeric()
                                ->label('Total Price')
                                ->prefix('DZD')
                                ->helperText('Enter the total order amount')
                                ->columnSpanFull(),
                        ])
                        ->columns(1),

                    Forms\Components\Section::make('Delivery Information')
                        ->schema([
                            Forms\Components\TextInput::make('country_origin')
                                ->maxLength(255)
                                ->label('Country of Origin')
                                ->placeholder('e.g., China, Turkey, France'),
                            Forms\Components\DatePicker::make('delivery_date_expected')
                                ->label('Expected Delivery Date')
                                ->native(false)
                                ->minDate(now())
                                ->helperText('When do you expect this shipment to arrive?'),
                            Forms\Components\Select::make('stock_hub_id')
                                ->options(fn () => \App\Models\StockHub::query()->pluck('name', 'id'))
                                ->searchable()
                                ->required()
                                ->label('Destination Hub')
                                ->helperText('Where will this order be received?'),
                        ])
                        ->columns(3),

                    Forms\Components\Section::make('Client Assignment (Optional)')
                        ->description('Assign a client if this is a pre-sold order')
                        ->schema([
                            Forms\Components\Select::make('client_id')
                                ->options(fn () => \App\Models\Client::query()->pluck('name', 'id'))
                                ->searchable()
                                ->label('Client')
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('name')
                                        ->required()
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('email')
                                        ->email()
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('phone')
                                        ->tel()
                                        ->maxLength(20),
                                    Forms\Components\Textarea::make('address')
                                        ->rows(2),
                                ])
                                ->helperText('Leave empty if this is stock inventory'),
                        ]),
                ]),

            Wizard\Step::make('Payment')
                ->description('Select payment wallet and debit the order amount')
                ->icon('heroicon-o-wallet')
                ->schema([
                    Forms\Components\Section::make('Payment Information')
                        ->description('The order amount will be debited from the selected wallet')
                        ->schema([
                            Forms\Components\Select::make('wallet_id')
                                ->label('Payment Wallet')
                                ->options(function () {
                                    return Wallet::query()
                                        ->where('is_active', true)
                                        ->get()
                                        ->mapWithKeys(function ($wallet) {
                                            return [
                                                $wallet->id => sprintf(
                                                    '%s (%s %s)',
                                                    $wallet->name,
                                                    number_format($wallet->balance, 2),
                                                    $wallet->currency
                                                )
                                            ];
                                        });
                                })
                                ->required()
                                ->searchable()
                                ->helperText('Select the wallet to debit for this order')
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    if ($state) {
                                        $wallet = Wallet::find($state);
                                        $totalPrice = $get('total_price');

                                        if ($wallet && $totalPrice && $wallet->balance < $totalPrice) {
                                            $set('wallet_warning', true);
                                        } else {
                                            $set('wallet_warning', false);
                                        }
                                    }
                                }),
                            Forms\Components\Placeholder::make('wallet_balance')
                                ->label('Wallet Balance')
                                ->content(function (callable $get) {
                                    $walletId = $get('wallet_id');
                                    if (!$walletId) {
                                        return 'Select a wallet to see balance';
                                    }

                                    $wallet = Wallet::find($walletId);
                                    if (!$wallet) {
                                        return 'N/A';
                                    }

                                    return sprintf(
                                        '%s %s',
                                        number_format($wallet->balance, 2),
                                        $wallet->currency
                                    );
                                }),
                            Forms\Components\Placeholder::make('order_total')
                                ->label('Order Total')
                                ->content(function (callable $get) {
                                    $totalPrice = $get('total_price');
                                    return $totalPrice
                                        ? number_format($totalPrice, 2) . ' DZD'
                                        : '0.00 DZD';
                                }),
                            Forms\Components\Placeholder::make('balance_after')
                                ->label('Balance After Payment')
                                ->content(function (callable $get) {
                                    $walletId = $get('wallet_id');
                                    $totalPrice = $get('total_price');

                                    if (!$walletId || !$totalPrice) {
                                        return 'N/A';
                                    }

                                    $wallet = Wallet::find($walletId);
                                    if (!$wallet) {
                                        return 'N/A';
                                    }

                                    $balanceAfter = $wallet->balance - $totalPrice;
                                    $color = $balanceAfter >= 0 ? 'text-success-600' : 'text-danger-600';

                                    return new \Illuminate\Support\HtmlString(
                                        sprintf(
                                            '<span class="%s font-bold">%s %s</span>',
                                            $color,
                                            number_format($balanceAfter, 2),
                                            $wallet->currency
                                        )
                                    );
                                }),
                        ])
                        ->columns(2),

                    Forms\Components\Textarea::make('notes')
                        ->label('Order Notes')
                        ->rows(3)
                        ->placeholder('Add any notes or special instructions for this order')
                        ->columnSpanFull(),
                ]),

            Wizard\Step::make('Review & Confirm')
                ->description('Review order details before creating')
                ->icon('heroicon-o-check-circle')
                ->schema([
                    Forms\Components\Section::make('Order Summary')
                        ->schema([
                            Forms\Components\Placeholder::make('review_items')
                                ->label('Products')
                                ->content(function (callable $get) {
                                    $items = $get('items');
                                    if (!$items || count($items) === 0) {
                                        return 'No items';
                                    }

                                    $html = '<ul class="space-y-1">';
                                    foreach ($items as $item) {
                                        $product = \App\Models\Product::find($item['product_id'] ?? null);
                                        $productName = $product?->name ?? 'Unknown';
                                        $quantity = $item['quantity'] ?? 0;
                                        $price = $item['price_per_unit'] ?? 0;
                                        $subtotal = $item['subtotal'] ?? 0;

                                        $html .= sprintf(
                                            '<li>%s - Qty: %s × %s DZD = <strong>%s DZD</strong></li>',
                                            $productName,
                                            number_format($quantity),
                                            number_format($price, 2),
                                            number_format($subtotal, 2)
                                        );
                                    }
                                    $html .= '</ul>';

                                    return new \Illuminate\Support\HtmlString($html);
                                })
                                ->columnSpanFull(),
                            Forms\Components\Placeholder::make('review_supplier')
                                ->label('Supplier')
                                ->content(function (callable $get) {
                                    $supplierId = $get('supplier_id');
                                    if (!$supplierId) {
                                        return 'N/A';
                                    }
                                    $supplier = \App\Models\Supplier::find($supplierId);
                                    return $supplier ? $supplier->name : 'N/A';
                                }),
                            Forms\Components\Placeholder::make('review_total')
                                ->label('Total Price')
                                ->content(function (callable $get) {
                                    $total = $get('total_price');
                                    return $total
                                        ? new \Illuminate\Support\HtmlString(
                                            '<span class="text-lg font-bold text-primary-600">'
                                            . number_format($total, 2) . ' DZD</span>'
                                        )
                                        : 'N/A';
                                }),
                            Forms\Components\Placeholder::make('review_hub')
                                ->label('Destination Hub')
                                ->content(function (callable $get) {
                                    $hubId = $get('stock_hub_id');
                                    if (!$hubId) {
                                        return 'N/A';
                                    }
                                    $hub = \App\Models\StockHub::find($hubId);
                                    return $hub ? $hub->name . ' (' . $hub->location . ')' : 'N/A';
                                }),
                            Forms\Components\Placeholder::make('review_delivery')
                                ->label('Expected Delivery')
                                ->content(function (callable $get) {
                                    $date = $get('delivery_date_expected');
                                    return $date ? \Carbon\Carbon::parse($date)->format('M d, Y') : 'Not specified';
                                }),
                            Forms\Components\Placeholder::make('review_client')
                                ->label('Client')
                                ->content(function (callable $get) {
                                    $clientId = $get('client_id');
                                    if (!$clientId) {
                                        return 'No client (Stock inventory)';
                                    }
                                    $client = \App\Models\Client::find($clientId);
                                    return $client ? $client->name : 'N/A';
                                }),
                            Forms\Components\Placeholder::make('review_wallet')
                                ->label('Payment Wallet')
                                ->content(function (callable $get) {
                                    $walletId = $get('wallet_id');
                                    if (!$walletId) {
                                        return 'N/A';
                                    }
                                    $wallet = Wallet::find($walletId);
                                    return $wallet ? $wallet->name : 'N/A';
                                }),
                        ])
                        ->columns(2),
                ]),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::id();
        $data['status'] = 'pending';

        // Extract items to save separately
        $items = $data['items'] ?? [];
        unset($data['items']);

        // Store items temporarily for afterCreate
        $this->orderItems = $items;

        return $data;
    }

    protected array $orderItems = [];

    protected function afterCreate(): void
    {
        $order = $this->record;

        // Create order items
        if (!empty($this->orderItems)) {
            foreach ($this->orderItems as $item) {
                $order->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price_per_unit' => $item['price_per_unit'],
                    'subtotal' => $item['subtotal'],
                    'notes' => $item['notes'] ?? null,
                ]);
            }
        }

        // Debit the wallet
        if ($order->wallet_id && $order->total_price) {
            $wallet = Wallet::find($order->wallet_id);

            if ($wallet) {
                try {
                    $wallet->debit(
                        $order->total_price,
                        'order_payment',
                        "Payment for order {$order->order_number}",
                        $order->id
                    );
                } catch (\Exception $e) {
                    // If wallet debit fails, we should handle this
                    // For now, we'll just log it
                    \Log::error('Failed to debit wallet for order: ' . $e->getMessage());
                }
            }
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
