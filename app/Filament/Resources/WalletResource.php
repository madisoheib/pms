<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WalletResource\Pages;
use App\Filament\Resources\WalletResource\RelationManagers;
use App\Models\Wallet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WalletResource extends Resource
{
    protected static ?string $model = Wallet::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Financial');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Wallet Information'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label(__('Name'))
                            ->placeholder(__('e.g., Main Business Wallet'))
                            ->autocomplete(false),
                        Forms\Components\Select::make('currency')
                            ->required()
                            ->label(__('Currency'))
                            ->options([
                                'DZD' => 'DZD - Algerian Dinar',
                                'USD' => 'USD - US Dollar',
                                'EUR' => 'EUR - Euro',
                                'CNY' => 'CNY - Chinese Yuan',
                                'TRY' => 'TRY - Turkish Lira',
                                'AED' => 'AED - UAE Dirham',
                            ])
                            ->searchable()
                            ->native(false),
                        Forms\Components\TextInput::make('balance')
                            ->required()
                            ->numeric()
                            ->label(__('Balance'))
                            ->prefix(fn ($get) => $get('currency') ?? 'DZD')
                            ->minValue(0)
                            ->default(0.00)
                            ->step(0.01)
                            ->helperText(__('Initial balance for this wallet')),
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->label(__('Assigned To'))
                            ->helperText(__('Optional: Assign this wallet to a specific user')),
                        Forms\Components\Toggle::make('is_active')
                            ->label(__('Active'))
                            ->default(true),
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->label(__('Description'))
                            ->placeholder(__('Additional notes about this wallet'))
                            ->columnSpanFull(),
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
                    ->label(__('Name'))
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('currency')
                    ->badge()
                    ->label(__('Currency'))
                    ->color(fn (string $state): string => match ($state) {
                        'DZD' => 'success',
                        'USD' => 'info',
                        'EUR' => 'warning',
                        'CNY' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('balance')
                    ->money(fn ($record) => $record->currency)
                    ->sortable()
                    ->label(__('Balance'))
                    ->weight('bold')
                    ->color(fn ($state) => $state > 0 ? 'success' : 'danger'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('Assigned To'))
                    ->sortable()
                    ->toggleable()
                    ->placeholder(__('Unassigned')),
                Tables\Columns\TextColumn::make('transactions_count')
                    ->counts('transactions')
                    ->badge()
                    ->color('info')
                    ->label(__('Transactions')),
                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('Active'))
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('Created At'))
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('currency')
                    ->options([
                        'DZD' => 'DZD',
                        'USD' => 'USD',
                        'EUR' => 'EUR',
                        'CNY' => 'CNY',
                        'TRY' => 'TRY',
                        'AED' => 'AED',
                    ])
                    ->label(__('Currency')),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('Active'))
                    ->boolean()
                    ->trueLabel(__('Active only'))
                    ->falseLabel(__('Inactive only'))
                    ->native(false),
                Tables\Filters\Filter::make('has_balance')
                    ->query(fn (Builder $query): Builder => $query->where('balance', '>', 0))
                    ->label(__('Has Balance'))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            RelationManagers\TransactionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWallets::route('/'),
            'create' => Pages\CreateWallet::route('/create'),
            'edit' => Pages\EditWallet::route('/{record}/edit'),
        ];
    }
}
