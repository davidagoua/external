<?php

namespace App\Filament\Resources\Etablissements\Pages;

use App\Filament\Resources\Etablissements\EtablissementResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEtablissement extends ViewRecord
{
    protected static string $resource = EtablissementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
