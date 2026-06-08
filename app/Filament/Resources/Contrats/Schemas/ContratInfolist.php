<?php

namespace App\Filament\Resources\Contrats\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ContratInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('employe.nom'),
                TextEntry::make('employe.prenom'),
                TextEntry::make('libele'),
                TextEntry::make('date_debut'),
                TextEntry::make('date_fin'),
                TextEntry::make('duree')->suffix(' mois'),
                TextEntry::make('pdf')
                    ->placeholder('-'),
            ]);
    }
}
