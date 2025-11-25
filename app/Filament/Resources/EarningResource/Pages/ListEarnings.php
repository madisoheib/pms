<?php

namespace App\Filament\Resources\EarningResource\Pages;

use App\Filament\Resources\EarningResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListEarnings extends ListRecords
{
    protected static string $resource = EarningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // No create action as earnings are auto-generated
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            EarningResource\Widgets\EarningsStatsOverview::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(__('All'))
                ->badge(fn () => \App\Models\Earning::count()),

            'profitable' => Tab::make(__('Profitable'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('earning_amount', '>', 0))
                ->badge(fn () => \App\Models\Earning::where('earning_amount', '>', 0)->count())
                ->badgeColor('success'),

            'loss' => Tab::make(__('Loss'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('earning_amount', '<', 0))
                ->badge(fn () => \App\Models\Earning::where('earning_amount', '<', 0)->count())
                ->badgeColor('danger'),

            'this_month' => Tab::make(__('This Month'))
                ->modifyQueryUsing(fn (Builder $query) => $query->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year))
                ->badge(fn () => \App\Models\Earning::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count()),
        ];
    }
}