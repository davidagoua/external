<?php

namespace App\Filament\Resources\Employes\Tables;

use App\Filament\Resources\Contrats\ContratResource;
use App\Models\Contrat;
use App\Models\Employe;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ButtonAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class EmployesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('nom')
                    ->searchable(),
                TextColumn::make('prenoms')
                    ->searchable(),
                TextColumn::make('contrat.libele')
                    ->badge(),
                TextColumn::make('etablissement.nom'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                ActionGroup::make([
                    Action::make('create_contract')
                        ->label("Créer un contrat")
                        ->url(fn ($record) => ContratResource::getUrl('create', ['employe_id' => $record->id] ))

                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    BulkAction::make('create_bulletin')
                        ->label("Générer bulletin de paie")
                        ->requiresConfirmation()
                        ->successNotificationTitle("Bulletins Généré")
                        ->action(function(Collection $records){
                            $records->each(function(Employe $record){
                                return $record->generate_bulletin();
                            });
                        })
                ]),
            ]);
    }
}
