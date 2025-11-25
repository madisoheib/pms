<?php

namespace App\Filament\Resources\EarningResource\Widgets;

use App\Models\Earning;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class EarningsStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalEarnings = Earning::sum('earning_amount');
        $monthEarnings = Earning::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('earning_amount');
        $profitableCount = Earning::where('earning_amount', '>', 0)->count();
        $lossCount = Earning::where('earning_amount', '<', 0)->count();

        return [
            Stat::make(__('Total Earnings'), '$' . Number::format($totalEarnings, 2))
                ->description(__('All time earnings'))
                ->descriptionIcon($totalEarnings > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($totalEarnings > 0 ? 'success' : 'danger'),

            Stat::make(__('This Month'), '$' . Number::format($monthEarnings, 2))
                ->description(__('Current month earnings'))
                ->descriptionIcon($monthEarnings > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($monthEarnings > 0 ? 'success' : 'danger'),

            Stat::make(__('Profitable Sales'), $profitableCount)
                ->description(__('Number of profitable sales'))
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make(__('Loss Sales'), $lossCount)
                ->description(__('Number of sales with loss'))
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}