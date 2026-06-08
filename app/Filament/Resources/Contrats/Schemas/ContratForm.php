<?php

namespace App\Filament\Resources\Contrats\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContratForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('employe_id')
                    ->searchable()
                    ->relationship('employe', 'nom')
                    ->required(),
                TextInput::make('libele')
                    ->label('Titre du contrat')
                    ->required(),
                TextInput::make('duree')
                    ->label("Durée du contrat (en mois)")
                    ->suffix('mois'),
                DatePicker::make('date_debut'),
                TextInput::make('salaire_base')
                    ->numeric()
                    ->suffix('FCFA')
                    ->label('Salaire de base'),
                FileUpload::make('pdf')->acceptedFileTypes(['application/pdf']),
            ]);
    }
}
