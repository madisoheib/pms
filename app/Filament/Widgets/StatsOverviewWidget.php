<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make(__('Total Users'), User::count())
                ->description(__('Registered users'))
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make(__('Total Roles'), Role::count())
                ->description(__('System roles'))
                ->descriptionIcon('heroicon-m-shield-check')
                ->color('warning'),

            Stat::make(__('Total Permissions'), Permission::count())
                ->description(__('Available permissions'))
                ->descriptionIcon('heroicon-m-key')
                ->color('info'),

            Stat::make(__('Super Admins'), User::role('super_admin')->count())
                ->description(__('Super admin users'))
                ->descriptionIcon('heroicon-m-star')
                ->color('danger'),
        ];
    }
}
