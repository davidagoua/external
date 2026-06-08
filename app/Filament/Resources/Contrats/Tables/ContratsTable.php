<?php

namespace App\Filament\Resources\Contrats\Tables;

use App\Models\Contrat;
use App\Models\Employe;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class ContratsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('employe.nom'),
                TextColumn::make('libele')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
                BulkAction::make('create_bulletin')
                    ->label("Générer bulletin de paie")
                    ->requiresConfirmation()
                    ->successNotificationTitle("Bulletins Généré")
                    ->action(function(Collection $records){
                        $records->each(function(Contrat $record){
                            return $record->generate_bulletin();
                        });
                    })
            ]);
    }
}
