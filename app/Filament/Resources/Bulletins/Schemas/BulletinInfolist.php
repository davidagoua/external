<?php

namespace App\Filament\Resources\Bulletins\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BulletinInfolist
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
                TextEntry::make('libele'),
                TextEntry::make('contrat.libele'),
                TextEntry::make('employe.nom'),
                TextEntry::make('status'),
            ]);
    }
}
