<?php

namespace App\Filament\Resources\TransitReceiptResource\Pages;

use App\Filament\Resources\TransitReceiptResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransitReceipts extends ListRecords
{
    protected static string $resource = TransitReceiptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
