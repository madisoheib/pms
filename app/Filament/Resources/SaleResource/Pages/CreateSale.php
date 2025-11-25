<?php

namespace App\Filament\Resources\SaleResource\Pages;

use App\Filament\Resources\SaleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSale extends CreateRecord
{
    protected static string $resource = SaleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Generate sale number if not provided
        if (empty($data['sale_number'])) {
            $data['sale_number'] = 'SALE-' . date('Y') . '-' . str_pad(\App\Models\Sale::max('id') + 1, 6, '0', STR_PAD_LEFT);
        }

        // Set the date if not provided
        if (empty($data['date'])) {
            $data['date'] = now();
        }

        return $data;
    }
}