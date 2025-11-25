<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Credentials extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    protected static string $view = 'filament.pages.credentials';

    protected static ?string $title = 'Credentials';

    protected static ?string $navigationLabel = 'Credentials';

    protected static ?string $slug = 'credentials';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationGroup = 'Settings';

    public static function shouldRegisterNavigation(): bool
    {
        return false; // Hide from main navigation as it's accessed from dashboard
    }
}