<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('User Management');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('User Information'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label(__('Name')),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->label(__('Email')),

                        Forms\Components\Select::make('roles')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->required()
                            ->label(__('Roles'))
                            ->helperText(__('Select one or more roles for this user')),
                    ])
                    ->columns(2),

                Forms\Components\Section::make(__('Password'))
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->maxLength(255)
                            ->label(__('Password'))
                            ->revealable()
                            ->confirmed(),

                        Forms\Components\TextInput::make('password_confirmation')
                            ->password()
                            ->dehydrated(false)
                            ->maxLength(255)
                            ->label(__('Confirm Password'))
                            ->revealable()
                            ->required(fn (string $context): bool => $context === 'create'),
                    ])
                    ->columns(2)
                    ->description(__('Leave empty to keep current password')),

                Forms\Components\Section::make(__('Status'))
                    ->schema([
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label(__('Email Verified At'))
                            ->helperText(__('Set this to mark the email as verified')),

                        Forms\Components\Placeholder::make('created_at')
                            ->label(__('Created At'))
                            ->content(fn ($record): string => $record?->created_at?->diffForHumans() ?? '-')
                            ->hidden(fn ($context) => $context === 'create'),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label(__('Last Updated At'))
                            ->content(fn ($record): string => $record?->updated_at?->diffForHumans() ?? '-')
                            ->hidden(fn ($context) => $context === 'create'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label(__('Name')),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->label(__('Email')),

                Tables\Columns\TextColumn::make('roles.name')
                    ->badge()
                    ->searchable()
                    ->label(__('Roles'))
                    ->colors([
                        'danger' => 'super_admin',
                        'warning' => 'admin',
                        'success' => 'stock_agent',
                        'info' => 'view_only',
                    ]),

                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label(__('Verified'))
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label(__('Created At')),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label(__('Updated At')),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->label(__('Filter by Role')),

                Tables\Filters\TernaryFilter::make('email_verified_at')
                    ->label(__('Email Verification'))
                    ->nullable()
                    ->placeholder(__('All users'))
                    ->trueLabel(__('Verified only'))
                    ->falseLabel(__('Unverified only')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
