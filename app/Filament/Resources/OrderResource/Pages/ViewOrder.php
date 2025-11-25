<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('download_qr')
                ->label('Download QR Code')
                ->icon('heroicon-o-qr-code')
                ->color('secondary')
                ->url(function ($record) {
                    // Generate comprehensive QR data
                    $qrData = json_encode([
                        'type' => 'order',
                        'order_number' => $record->order_number,
                        'supplier' => $record->supplier?->name,
                        'total' => $record->total_price . ' DZD',
                        'items' => $record->items->count(),
                        'total_qty' => $record->items->sum('quantity'),
                        'status' => $record->status,
                        'expected_delivery' => $record->delivery_date_expected?->format('Y-m-d'),
                        'destination' => $record->stockHub?->name,
                        'created' => $record->created_at->format('Y-m-d'),
                    ]);
                    return 'https://api.qrserver.com/v1/create-qr-code/?size=500x500&format=png&download=1&data=' . urlencode($qrData);
                })
                ->openUrlInNewTab(),
            Actions\Action::make('mark_in_transit')
                ->label('Mark In Transit')
                ->icon('heroicon-o-truck')
                ->color('info')
                ->requiresConfirmation()
                ->visible(fn ($record) => $record->isPending())
                ->action(fn ($record) => $record->markAsInTransit())
                ->after(fn () => $this->refreshFormData(['status'])),
            Actions\Action::make('mark_received')
                ->label('Mark Received')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation()
                ->visible(fn ($record) => $record->isInTransit())
                ->action(fn ($record) => $record->markAsReceived())
                ->after(fn () => $this->refreshFormData(['status']))
                ->modalHeading('Receive Order')
                ->modalDescription('This will mark the order as received and update the stock'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Order Information')
                    ->schema([
                        Infolists\Components\Grid::make(4)
                            ->schema([
                                Infolists\Components\TextEntry::make('order_number')
                                    ->label('Order Number')
                                    ->copyable()
                                    ->badge()
                                    ->color('primary'),
                                Infolists\Components\TextEntry::make('status')
                                    ->label('Status')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'pending' => 'warning',
                                        'in_transit' => 'info',
                                        'received' => 'success',
                                        'confirmed' => 'success',
                                        default => 'gray',
                                    })
                                    ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state))),
                                Infolists\Components\TextEntry::make('created_at')
                                    ->label('Created')
                                    ->dateTime(),
                                Infolists\Components\ImageEntry::make('qr_code')
                                    ->label('QR Code')
                                    ->getStateUsing(function ($record) {
                                        $qrData = json_encode([
                                            'type' => 'order',
                                            'order' => $record->order_number,
                                            'total' => $record->total_price . ' DZD',
                                            'items' => $record->items->count(),
                                            'status' => $record->status,
                                        ]);
                                        return 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($qrData);
                                    })
                                    ->width(150)
                                    ->height(150),
                            ]),
                    ]),

                Infolists\Components\Section::make('Order Items')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('items')
                            ->label('')
                            ->schema([
                                Infolists\Components\TextEntry::make('product.name')
                                    ->label('Product'),
                                Infolists\Components\TextEntry::make('product.sku')
                                    ->label('SKU'),
                                Infolists\Components\TextEntry::make('quantity')
                                    ->label('Quantity')
                                    ->numeric(),
                                Infolists\Components\TextEntry::make('price_per_unit')
                                    ->label('Price per Unit')
                                    ->money('DZD'),
                                Infolists\Components\TextEntry::make('subtotal')
                                    ->label('Subtotal')
                                    ->money('DZD')
                                    ->weight('bold'),
                            ])
                            ->columns(5)
                            ->columnSpanFull(),
                    ]),

                Infolists\Components\Section::make('Order Total')
                    ->schema([
                        Infolists\Components\TextEntry::make('total_price')
                            ->label('Total Price')
                            ->money('DZD')
                            ->weight('bold')
                            ->size('lg'),
                    ])
                    ->columns(1),

                Infolists\Components\Section::make('Transit & Delivery')
                    ->schema([
                        Infolists\Components\TextEntry::make('country_origin')
                            ->label('Country of Origin')
                            ->placeholder('Not specified'),
                        Infolists\Components\TextEntry::make('delivery_date_expected')
                            ->label('Expected Delivery')
                            ->date()
                            ->placeholder('Not specified'),
                        Infolists\Components\TextEntry::make('stockHub.name')
                            ->label('Destination Hub')
                            ->badge()
                            ->color('info'),
                        Infolists\Components\TextEntry::make('stockHub.location')
                            ->label('Hub Location'),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Business Partners')
                    ->schema([
                        Infolists\Components\TextEntry::make('supplier.name')
                            ->label('Supplier'),
                        Infolists\Components\TextEntry::make('client.name')
                            ->label('Client')
                            ->placeholder('No client assigned'),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Payment Information')
                    ->schema([
                        Infolists\Components\TextEntry::make('wallet.name')
                            ->label('Payment Wallet'),
                        Infolists\Components\TextEntry::make('wallet.currency')
                            ->label('Currency'),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Additional Information')
                    ->schema([
                        Infolists\Components\TextEntry::make('notes')
                            ->label('Notes')
                            ->placeholder('No notes')
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('createdBy.name')
                            ->label('Created By'),
                    ])
                    ->columns(2),
            ]);
    }
}
