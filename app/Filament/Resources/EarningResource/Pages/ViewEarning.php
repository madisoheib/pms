<?php

namespace App\Filament\Resources\EarningResource\Pages;

use App\Filament\Resources\EarningResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEarning extends ViewRecord
{
    protected static string $resource = EarningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // No edit or delete actions as earnings are auto-generated
        ];
    }
}