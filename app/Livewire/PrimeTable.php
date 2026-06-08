<?php

namespace App\Livewire;

use App\Models\Prime;
use App\Models\TypePrime;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class PrimeTable extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Prime::query()->where('bulletin_id', request()->get('bulletin_id')))
            ->columns([
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('nombre')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('type_prime_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('bulletin_id')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make('Créer')
                    ->schema([
                        Select::make('type_prime_id')
                            ->label('Type prime')
                            ->required()
                            ->options(TypePrime::query()->pluck('name', 'id')),
                        TextInput::make('nombre'),
                    ])
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
