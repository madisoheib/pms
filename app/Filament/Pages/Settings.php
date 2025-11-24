<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament.pages.settings';

    protected static ?int $navigationSort = 99;

    public static function getNavigationGroup(): ?string
    {
        return __('System');
    }

    public static function getNavigationLabel(): string
    {
        return __('Settings');
    }

    public function getTitle(): string
    {
        return __('Application Settings');
    }

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'app_name' => Setting::get('app_name', 'PSM Business Management'),
            'app_timezone' => Setting::get('app_timezone', 'UTC'),
            'default_currency' => Setting::get('default_currency', 'DZD'),
            'low_stock_threshold' => Setting::get('low_stock_threshold', 10),
            'items_per_page' => Setting::get('items_per_page', 25),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('General Settings'))
                    ->schema([
                        Forms\Components\TextInput::make('app_name')
                            ->label(__('Application Name'))
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('app_timezone')
                            ->label(__('Timezone'))
                            ->options([
                                'UTC' => 'UTC',
                                'Africa/Algiers' => 'Africa/Algiers',
                                'Europe/Paris' => 'Europe/Paris',
                                'Asia/Dubai' => 'Asia/Dubai',
                                'Asia/Shanghai' => 'Asia/Shanghai',
                            ])
                            ->required()
                            ->searchable(),

                        Forms\Components\Select::make('default_currency')
                            ->label(__('Default Currency'))
                            ->options([
                                'DZD' => 'DZD - Algerian Dinar',
                                'USD' => 'USD - US Dollar',
                                'EUR' => 'EUR - Euro',
                                'CNY' => 'CNY - Chinese Yuan',
                                'AED' => 'AED - UAE Dirham',
                            ])
                            ->required()
                            ->searchable(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make(__('Stock Settings'))
                    ->schema([
                        Forms\Components\TextInput::make('low_stock_threshold')
                            ->label(__('Low Stock Alert Threshold'))
                            ->helperText(__('Alert when stock falls below this number'))
                            ->numeric()
                            ->required()
                            ->minValue(1),

                        Forms\Components\TextInput::make('items_per_page')
                            ->label(__('Items Per Page'))
                            ->helperText(__('Number of items to display per page in lists'))
                            ->numeric()
                            ->required()
                            ->minValue(10)
                            ->maxValue(100),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            $type = is_numeric($value) ? 'integer' : 'string';
            Setting::set($key, $value, $type, 'general');
        }

        Notification::make()
            ->success()
            ->title(__('Settings saved'))
            ->body(__('Your settings have been saved successfully.'))
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Save Settings'))
                ->action('save')
                ->icon('heroicon-o-check-circle')
                ->color('primary'),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()->can('view settings');
    }
}
