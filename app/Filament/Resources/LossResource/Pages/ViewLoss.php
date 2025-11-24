<?php

namespace App\Filament\Resources\LossResource\Pages;

use App\Filament\Resources\LossResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLoss extends ViewRecord
{
    protected static string $resource = LossResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
