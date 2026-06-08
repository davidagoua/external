<?php

namespace App\Filament\Resources\Employes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EmployeInfolist
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
                TextEntry::make('prenoms'),
                TextEntry::make('date_naissance')
                    ->date(),
                TextEntry::make('lieu_naissance'),
                TextEntry::make('etablissement.nom'),
            ]);
    }
}
