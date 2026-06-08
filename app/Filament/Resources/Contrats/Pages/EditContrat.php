<?php

namespace App\Filament\Resources\Contrats\Pages;

use App\Filament\Resources\Contrats\ContratResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditContrat extends EditRecord
{
    protected static string $resource = ContratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
