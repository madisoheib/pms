<?php

namespace App\Filament\Resources\WalletResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionsRelationManager extends RelationManager
{
    protected static string $relationship = 'transactions';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->options([
                        'debit' => 'Debit (Money Out)',
                        'credit' => 'Credit (Money In)',
                    ])
                    ->required()
                    ->native(false),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->prefix(fn () => $this->getOwnerRecord()->currency)
                    ->minValue(0.01)
                    ->step(0.01),
                Forms\Components\TextInput::make('reference')
                    ->maxLength(255)
                    ->placeholder('Transaction reference or ID'),
                Forms\Components\Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull()
                    ->placeholder('Transaction details'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('type')
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'credit' => 'success',
                        'debit' => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                Tables\Columns\TextColumn::make('amount')
                    ->money(fn () => $this->getOwnerRecord()->currency)
                    ->sortable()
                    ->weight('bold')
                    ->color(fn ($record) => $record->type === 'credit' ? 'success' : 'danger'),
                Tables\Columns\TextColumn::make('reference')
                    ->searchable()
                    ->toggleable()
                    ->placeholder('N/A'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('createdBy.name')
                    ->label('Created By')
                    ->toggleable()
                    ->placeholder('System'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'credit' => 'Credit',
                        'debit' => 'Debit',
                    ]),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['created_by'] = auth()->id();
                        return $data;
                    })
                    ->after(function ($record) {
                        $wallet = $this->getOwnerRecord();

                        // Update wallet balance
                        if ($record->type === 'credit') {
                            $wallet->increment('balance', $record->amount);
                        } else {
                            $wallet->decrement('balance', $record->amount);
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->disabled(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        $wallet = $this->getOwnerRecord();

                        // Reverse the transaction on wallet balance
                        if ($record->type === 'credit') {
                            $wallet->decrement('balance', $record->amount);
                        } else {
                            $wallet->increment('balance', $record->amount);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records) {
                            $wallet = $this->getOwnerRecord();

                            // Reverse all transactions on wallet balance
                            foreach ($records as $record) {
                                if ($record->type === 'credit') {
                                    $wallet->decrement('balance', $record->amount);
                                } else {
                                    $wallet->increment('balance', $record->amount);
                                }
                            }
                        }),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
