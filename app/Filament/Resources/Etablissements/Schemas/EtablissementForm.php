<?php

namespace App\Filament\Resources\Etablissements\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EtablissementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nom')
                    ->required(),
                Select::make('societe_id')
                    ->relationship('societe', 'nom')
                    ->preload()
                    ->searchable()
                    ->required(),
            ]);
    }
}
