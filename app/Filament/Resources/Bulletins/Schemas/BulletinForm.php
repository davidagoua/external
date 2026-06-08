<?php

namespace App\Filament\Resources\Bulletins\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BulletinForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('libele')
                    ->required(),
                Select::make('contrat_id')
                    ->relationship('contrat', 'libele')
                    ->disabled(),
                Select::make('employe_id')
                    ->relationship('employe', 'nom')
                    ->disabled(),
                TextInput::make('status')
                    ->required(),
            ]);
    }
}
