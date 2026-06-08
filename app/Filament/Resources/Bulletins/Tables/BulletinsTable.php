<?php

namespace App\Filament\Resources\Bulletins\Tables;


use App\Enums\BulletinStatus;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BulletinsTable
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
                TextColumn::make('libele')
                    ->searchable(),
                TextColumn::make('contrat.libele')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('employe.nom')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->numeric()
                    ->badge(),
                SelectColumn::make('status')
                    ->label('Options')
                    ->options(BulletinStatus::class)
                    ->selectablePlaceholder(false)
                    ->rules(['required']),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('prime')
                    ->label('Primer')
                    ->schema([
                        Repeater::make('prime')
                            ->schema([
                                Select::make('type')->options(['Type 1','Type 2','Type 3']),
                                TextInput::make('libele')->label('Titre de la prime'),
                                TextInput::make('montant')->label('Montant de la prime')->numeric(),
                            ])->columns(3),
                    ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
