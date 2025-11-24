<?php

namespace App\Filament\Resources\TransitReceiptResource\Pages;

use App\Filament\Resources\TransitReceiptResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransitReceipt extends EditRecord
{
    protected static string $resource = TransitReceiptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
