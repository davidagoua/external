<?php

namespace App\Filament\Resources\Etablissements\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EtablissementInfolist
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
                TextEntry::make('nom'),
                TextEntry::make('societe.nom')
                    ->numeric(),
            ]);
    }
}
