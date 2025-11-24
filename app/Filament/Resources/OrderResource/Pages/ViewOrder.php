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
                ->url(fn ($record) => OrderResource::getUrl('receive', ['record' => $record]))
                ->modalHeading('Receive Order')
                ->modalDescription('This will redirect you to the transit receipt page'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Order Information')
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
                    ])
                    ->columns(3),

                Infolists\Components\Section::make('Product Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('product.name')
                            ->label('Product'),
                        Infolists\Components\TextEntry::make('product.sku')
                            ->label('SKU'),
                        Infolists\Components\TextEntry::make('product.category.name')
                            ->label('Category'),
                    ])
                    ->columns(3),

                Infolists\Components\Section::make('Quantity & Pricing')
                    ->schema([
                        Infolists\Components\TextEntry::make('quantity_expected')
                            ->label('Expected Quantity')
                            ->numeric(),
                        Infolists\Components\TextEntry::make('price_per_unit')
                            ->label('Price per Unit')
                            ->money('DZD'),
                        Infolists\Components\TextEntry::make('total_price')
                            ->label('Total Price')
                            ->money('DZD')
                            ->weight('bold')
                            ->size('lg'),
                    ])
                    ->columns(3),

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
