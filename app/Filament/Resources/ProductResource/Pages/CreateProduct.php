<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Generate SKU if not provided
        if (empty($data['sku'])) {
            $lastProduct = Product::orderBy('id', 'desc')->first();
            $nextId = $lastProduct ? $lastProduct->id + 1 : 1;
            $year = date('Y');
            $data['sku'] = sprintf('PRD-%s-%05d', $year, $nextId);
        }

        return $data;
    }
}