<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static string $view = 'filament.pages.profile';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('User Management');
    }

    public static function getNavigationLabel(): string
    {
        return __('My Profile');
    }

    public function getTitle(): string
    {
        return __('My Profile');
    }

    protected static bool $shouldRegisterNavigation = true;

    public ?array $data = [];

    public function mount(): void
    {
        $user = auth()->user();

        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->getRoleNames()->first() ?? 'No Role',
            'current_password' => '',
            'password' => '',
            'password_confirmation' => '',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Profile Information'))
                    ->description(__('Update your account profile information'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('Name'))
                            ->required()
                            ->maxLength(255)
                            ->autocomplete('name'),

                        Forms\Components\TextInput::make('email')
                            ->label(__('Email'))
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->autocomplete('email')
                            ->unique(table: 'users', ignorable: fn () => auth()->user()),

                        Forms\Components\TextInput::make('role')
                            ->label(__('Current Role'))
                            ->disabled()
                            ->helperText(__('Contact an administrator to change your role')),
                    ])
                    ->columns(2),

                Forms\Components\Section::make(__('Update Password'))
                    ->description(__('Ensure your account is using a long, random password to stay secure'))
                    ->schema([
                        Forms\Components\TextInput::make('current_password')
                            ->label(__('Current Password'))
                            ->password()
                            ->currentPassword()
                            ->revealable()
                            ->helperText(__('Leave blank to keep current password')),

                        Forms\Components\TextInput::make('password')
                            ->label(__('New Password'))
                            ->password()
                            ->rule(Password::default())
                            ->revealable()
                            ->confirmed()
                            ->dehydrated(fn ($state) => filled($state))
                            ->helperText(__('Minimum 8 characters. Leave blank to keep current password')),

                        Forms\Components\TextInput::make('password_confirmation')
                            ->label(__('Confirm New Password'))
                            ->password()
                            ->revealable()
                            ->dehydrated(false),
                    ])
                    ->columns(1),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $user = auth()->user();

        // Update basic profile info
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        // Update password if provided
        if (filled($data['password'])) {
            $user->update([
                'password' => Hash::make($data['password']),
            ]);

            // Clear password fields after update
            $this->form->fill([
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->getRoleNames()->first() ?? 'No Role',
                'current_password' => '',
                'password' => '',
                'password_confirmation' => '',
            ]);

            Notification::make()
                ->success()
                ->title(__('Profile and password updated'))
                ->body(__('Your profile and password have been updated successfully.'))
                ->send();
        } else {
            Notification::make()
                ->success()
                ->title(__('Profile updated'))
                ->body(__('Your profile has been updated successfully.'))
                ->send();
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Save Changes'))
                ->action('save')
                ->icon('heroicon-o-check-circle')
                ->color('primary'),
        ];
    }
}
