<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Business Partners');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Supplier Information'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label(__('Name'))
                            ->autocomplete(false)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('contact_person')
                            ->label(__('Contact Person'))
                            ->maxLength(255)
                            ->placeholder(__('Primary contact name')),
                        Forms\Components\Select::make('country')
                            ->options([
                                'China' => 'China',
                                'Turkey' => 'Turkey',
                                'UAE' => 'UAE (Dubai)',
                                'France' => 'France',
                                'Germany' => 'Germany',
                                'Italy' => 'Italy',
                                'Spain' => 'Spain',
                                'USA' => 'USA',
                                'Other' => 'Other',
                            ])
                            ->searchable()
                            ->label(__('Country'))
                            ->placeholder(__('Select country')),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255)
                            ->label(__('Phone'))
                            ->placeholder('+86 138 0000 0000'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->label(__('Email'))
                            ->autocomplete(false),
                        Forms\Components\TextInput::make('city')
                            ->maxLength(255)
                            ->label(__('City'))
                            ->placeholder('Shanghai'),
                        Forms\Components\Textarea::make('address')
                            ->rows(3)
                            ->label(__('Address'))
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('payment_terms')
                            ->label(__('Payment Terms'))
                            ->rows(3)
                            ->placeholder(__('e.g., 30% advance, 70% on delivery'))
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_active')
                            ->label(__('Active'))
                            ->default(true)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('notes')
                            ->rows(3)
                            ->label(__('Notes'))
                            ->placeholder(__('Additional notes about this supplier'))
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
                Tables\Columns\TextColumn::make('contact_person')
                    ->searchable()
                    ->label(__('Contact Person'))
                    ->toggleable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->icon('heroicon-m-phone')
                    ->label(__('Phone'))
                    ->copyable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->icon('heroicon-m-envelope')
                    ->label(__('Email'))
                    ->copyable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable()
                    ->badge()
                    ->label(__('Country'))
                    ->color('warning'),
                Tables\Columns\TextColumn::make('city')
                    ->searchable()
                    ->label(__('City'))
                    ->toggleable(),
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
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('Active'))
                    ->boolean()
                    ->trueLabel(__('Active only'))
                    ->falseLabel(__('Inactive only'))
                    ->native(false),
                Tables\Filters\SelectFilter::make('country')
                    ->options([
                        'China' => 'China',
                        'Turkey' => 'Turkey',
                        'UAE' => 'UAE (Dubai)',
                        'France' => 'France',
                        'Germany' => 'Germany',
                    ])
                    ->label(__('Country')),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}
