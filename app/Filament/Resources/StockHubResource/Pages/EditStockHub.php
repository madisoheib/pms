<?php

namespace App\Filament\Resources\StockHubResource\Pages;

use App\Filament\Resources\StockHubResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStockHub extends EditRecord
{
    protected static string $resource = StockHubResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
