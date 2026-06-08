<?php

namespace App\Filament\Resources\Contrats\Pages;

use App\Filament\Resources\Contrats\ContratResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewContrat extends ViewRecord
{
    protected static string $resource = ContratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
