<?php

namespace App\Filament\Resources\Etablissements\Pages;

use App\Filament\Resources\Etablissements\EtablissementResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEtablissement extends EditRecord
{
    protected static string $resource = EtablissementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
