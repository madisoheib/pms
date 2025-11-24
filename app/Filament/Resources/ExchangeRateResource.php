<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExchangeRateResource\Pages;
use App\Filament\Resources\ExchangeRateResource\RelationManagers;
use App\Models\ExchangeRate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExchangeRateResource extends Resource
{
    protected static ?string $model = ExchangeRate::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';

    protected static ?string $navigationGroup = 'Financial Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Currency Pair')
                    ->schema([
                        Forms\Components\Select::make('from_currency')
                            ->label('From Currency')
                            ->options([
                                'USD' => 'USD - US Dollar',
                                'EUR' => 'EUR - Euro',
                                'DZD' => 'DZD - Algerian Dinar',
                                'CNY' => 'CNY - Chinese Yuan',
                                'AED' => 'AED - UAE Dirham',
                                'TRY' => 'TRY - Turkish Lira',
                                'GBP' => 'GBP - British Pound',
                            ])
                            ->required()
                            ->searchable()
                            ->native(false),
                        Forms\Components\Select::make('to_currency')
                            ->label('To Currency')
                            ->options([
                                'USD' => 'USD - US Dollar',
                                'EUR' => 'EUR - Euro',
                                'DZD' => 'DZD - Algerian Dinar',
                                'CNY' => 'CNY - Chinese Yuan',
                                'AED' => 'AED - UAE Dirham',
                                'TRY' => 'TRY - Turkish Lira',
                                'GBP' => 'GBP - British Pound',
                            ])
                            ->required()
                            ->searchable()
                            ->native(false),
                    ])->columns(2),

                Forms\Components\Section::make('Exchange Rate Details')
                    ->schema([
                        Forms\Components\TextInput::make('rate')
                            ->label('Exchange Rate')
                            ->required()
                            ->numeric()
                            ->step('0.00000001')
                            ->minValue(0)
                            ->helperText('1 unit of From Currency = X units of To Currency')
                            ->suffix('per unit'),
                        Forms\Components\DateTimePicker::make('effective_date')
                            ->label('Effective Date')
                            ->required()
                            ->default(now())
                            ->native(false),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Only active rates are used for currency conversion'),
                    ])->columns(2),

                Forms\Components\Section::make('Additional Information')
                    ->schema([
                        Forms\Components\Textarea::make('notes')
                            ->label('Notes')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('from_currency')
                    ->label('From')
                    ->badge()
                    ->color('warning')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('to_currency')
                    ->label('To')
                    ->badge()
                    ->color('success')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rate')
                    ->label('Exchange Rate')
                    ->numeric(decimalPlaces: 8)
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('effective_date')
                    ->label('Effective Date')
                    ->dateTime('M d, Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('from_currency')
                    ->label('From Currency')
                    ->options([
                        'USD' => 'USD',
                        'EUR' => 'EUR',
                        'DZD' => 'DZD',
                        'CNY' => 'CNY',
                        'AED' => 'AED',
                        'TRY' => 'TRY',
                        'GBP' => 'GBP',
                    ]),
                Tables\Filters\SelectFilter::make('to_currency')
                    ->label('To Currency')
                    ->options([
                        'USD' => 'USD',
                        'EUR' => 'EUR',
                        'DZD' => 'DZD',
                        'CNY' => 'CNY',
                        'AED' => 'AED',
                        'TRY' => 'TRY',
                        'GBP' => 'GBP',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->placeholder('All')
                    ->trueLabel('Active Only')
                    ->falseLabel('Inactive Only'),
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
            ->defaultSort('effective_date', 'desc');
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
            'index' => Pages\ListExchangeRates::route('/'),
            'create' => Pages\CreateExchangeRate::route('/create'),
            'edit' => Pages\EditExchangeRate::route('/{record}/edit'),
        ];
    }
}
