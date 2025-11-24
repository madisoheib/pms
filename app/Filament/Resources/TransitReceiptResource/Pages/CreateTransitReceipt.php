<?php

namespace App\Filament\Resources\TransitReceiptResource\Pages;

use App\Filament\Resources\TransitReceiptResource;
use App\Models\Loss;
use App\Models\Order;
use App\Models\Stock;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateTransitReceipt extends CreateRecord
{
    protected static string $resource = TransitReceiptResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['received_by'] = Auth::id();

        return $data;
    }

    protected function afterCreate(): void
    {
        $receipt = $this->record;
        $order = $receipt->order;

        DB::transaction(function () use ($receipt, $order) {
            // 1. Create loss record if there are missing items
            if ($receipt->quantity_discrepancy > 0) {
                $lossAmount = $receipt->quantity_discrepancy * $order->price_per_unit;

                Loss::create([
                    'order_id' => $order->id,
                    'product_id' => $order->product_id,
                    'quantity_missing' => $receipt->quantity_discrepancy,
                    'loss_amount' => $lossAmount,
                    'reason' => $receipt->notes ?: 'Missing items during transit',
                ]);

                // Notify about the loss
                Notification::make()
                    ->warning()
                    ->title('Loss Recorded')
                    ->body("Missing {$receipt->quantity_discrepancy} units. Loss amount: " . number_format($lossAmount, 2) . " DZD")
                    ->persistent()
                    ->send();
            }

            // 2. Update stock levels at the destination hub
            if ($order->stock_hub_id && $receipt->quantity_received > 0) {
                $stock = Stock::firstOrCreate(
                    [
                        'product_id' => $order->product_id,
                        'stock_hub_id' => $order->stock_hub_id,
                    ],
                    [
                        'quantity' => 0,
                    ]
                );

                $stock->addStock($receipt->quantity_received);

                Notification::make()
                    ->success()
                    ->title('Stock Updated')
                    ->body("Added {$receipt->quantity_received} units to {$order->stockHub->name}")
                    ->send();
            }

            // 3. Mark order as received
            $order->markAsReceived();

            // 4. If there's a client assigned, we would create an invoice here
            // For now, we'll just notify
            if ($order->client_id) {
                Notification::make()
                    ->info()
                    ->title('Pre-sold Order')
                    ->body("This order was pre-sold to {$order->client->name}. Create an invoice manually.")
                    ->persistent()
                    ->send();
            }
        });
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Transit receipt created successfully';
    }
}
