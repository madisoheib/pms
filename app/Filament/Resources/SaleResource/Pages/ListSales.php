<?php

namespace App\Filament\Resources\SaleResource\Pages;

use App\Filament\Resources\SaleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListSales extends ListRecords
{
    protected static string $resource = SaleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(__('All'))
                ->badge(fn () => \App\Models\Sale::count()),

            'pending' => Tab::make(__('Pending'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pending'))
                ->badge(fn () => \App\Models\Sale::where('status', 'pending')->count())
                ->badgeColor('warning'),

            'confirmed' => Tab::make(__('Confirmed'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'confirmed'))
                ->badge(fn () => \App\Models\Sale::where('status', 'confirmed')->count())
                ->badgeColor('success'),

            'paid' => Tab::make(__('Paid'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'paid'))
                ->badge(fn () => \App\Models\Sale::where('status', 'paid')->count())
                ->badgeColor('info'),

            'cancelled' => Tab::make(__('Cancelled'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'cancelled'))
                ->badge(fn () => \App\Models\Sale::where('status', 'cancelled')->count())
                ->badgeColor('danger'),
        ];
    }
}