<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class StockManagement extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static string $view = 'filament.pages.stock-management';

    protected static ?string $title = 'Stock Management';

    protected static ?string $navigationLabel = 'Stock Management';

    protected static ?string $slug = 'stock-management';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Inventory';

    public static function shouldRegisterNavigation(): bool
    {
        return false; // Hide from main navigation as it's accessed from dashboard
    }
}