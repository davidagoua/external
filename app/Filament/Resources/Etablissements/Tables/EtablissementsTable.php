<?php

namespace App\Filament\Resources\Etablissements\Tables;

use App\Filament\Resources\Employes\EmployeResource;
use App\Filament\Resources\Employes\Tables\EmployesTable;
use App\Models\Employe;
use App\Models\Etablissement;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EtablissementsTable
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
                TextColumn::make('employes_count')
                    ->label('# employés')
                    ->badge()
                    ->counts('employes'),
                TextColumn::make('societe.nom')
                    ->label('Societe')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('select')
                    ->label('Selectionner')
                    ->button()
                    ->action(function(Etablissement $record){
                        session()->push('etablissement_id', $record->id);
                        return redirect(EmployeResource::getIndexUrl());
                    } )
                    ->successNotification(Notification::make()->title("Etablissement selectionné")),
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    Action::make('assigner')
                        ->schema([
                            Select::make('assignee_id')
                                ->relationship('assignee', 'name')
                                ->searchable()
                        ])
                        ->action(function (Etablissement $record, array $data) {
                            $record->update($data);
                        })
                        ->successNotificationTitle("Etablissement assigné")
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
