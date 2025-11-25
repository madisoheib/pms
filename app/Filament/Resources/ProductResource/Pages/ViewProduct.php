<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProduct extends ViewRecord
{
    protected static string $resource = ProductResource::class;

    protected static string $view = 'filament.resources.product-resource.pages.view-product';

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function getQrCodeData(): string
    {
        $product = $this->record;

        // Generate QR code data with product information
        $qrData = [
            'id' => $product->id,
            'sku' => $product->sku,
            'name' => $product->name,
            'price' => $product->price_per_unit,
            'origin' => $product->country_origin,
            'stock' => $product->stock_quantity,
            'category' => $product->category?->name,
        ];

        return json_encode($qrData);
    }
}