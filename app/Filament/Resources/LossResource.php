<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LossResource\Pages;
use App\Filament\Resources\LossResource\RelationManagers;
use App\Models\Loss;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LossResource extends Resource
{
    protected static ?string $model = Loss::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';

    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): ?string
    {
        return __('Orders & Transit');
    }

    public static function getNavigationLabel(): string
    {
        return __('Losses');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Loss Information'))
                    ->schema([
                        Forms\Components\Select::make('order_id')
                            ->relationship('order', 'order_number')
                            ->required()
                            ->searchable()
                            ->label(__('Order'))
                            ->disabled(fn ($context) => $context === 'edit'),
                        Forms\Components\Select::make('product_id')
                            ->relationship('product', 'name')
                            ->required()
                            ->searchable()
                            ->label(__('Product'))
                            ->disabled(fn ($context) => $context === 'edit'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make(__('Loss Details'))
                    ->schema([
                        Forms\Components\TextInput::make('quantity_missing')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->label(__('Quantity Missing')),
                        Forms\Components\TextInput::make('loss_amount')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->label(__('Loss Amount'))
                            ->prefix('DZD'),
                        Forms\Components\Textarea::make('reason')
                            ->rows(3)
                            ->label(__('Reason / Notes'))
                            ->placeholder(__('Describe why items were lost or damaged'))
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order.order_number')
                    ->label(__('Order #'))
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('product.name')
                    ->label(__('Product'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity_missing')
                    ->label(__('Qty Missing'))
                    ->numeric()
                    ->alignCenter()
                    ->sortable()
                    ->badge()
                    ->color('danger'),
                Tables\Columns\TextColumn::make('loss_amount')
                    ->label(__('Loss Amount'))
                    ->money('DZD')
                    ->sortable()
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('DZD')
                            ->label(__('Total Losses')),
                    ]),
                Tables\Columns\TextColumn::make('order.stockHub.name')
                    ->label(__('Hub'))
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('reason')
                    ->label(__('Reason'))
                    ->limit(50)
                    ->toggleable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Recorded'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_id')
                    ->relationship('product', 'name')
                    ->searchable()
                    ->preload()
                    ->label(__('Product')),
                Tables\Filters\SelectFilter::make('order_id')
                    ->relationship('order', 'order_number')
                    ->searchable()
                    ->preload()
                    ->label(__('Order')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading(__('No losses recorded'))
            ->emptyStateDescription(__('Losses from transit discrepancies will appear here'))
            ->emptyStateIcon('heroicon-o-check-circle');
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
            'index' => Pages\ListLosses::route('/'),
            'create' => Pages\CreateLoss::route('/create'),
            'view' => Pages\ViewLoss::route('/{record}'),
            'edit' => Pages\EditLoss::route('/{record}/edit'),
        ];
    }
}
