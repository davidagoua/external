<?php

namespace App\Filament\Resources\Etablissements\Pages;

use App\Filament\Resources\Etablissements\EtablissementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEtablissements extends ListRecords
{
    protected static string $resource = EtablissementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
