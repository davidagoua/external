<?php

namespace App\Livewire;

use App\Models\TypePrime;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class TypePrimeTable extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => TypePrime::query())
            ->columns([
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('pourcentage')
                    ->numeric()
                    ->suffix('%')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('create')
                    ->label('Créer')
                    ->schema([
                        TextInput::make('name'),
                        TextInput::make('pourcentage')->suffix('%'),
                    ])
                    ->action(function (Array $data) {
                        $type = new TypePrime();
                        $type->name = $data['name'];
                        $type->pourcentage = $data['pourcentage'];
                        $type->save();
                    })
                    ->successNotificationTitle("Type prime ajouté")
            ])
            ->recordActions([
                DeleteAction::make('delete')
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
