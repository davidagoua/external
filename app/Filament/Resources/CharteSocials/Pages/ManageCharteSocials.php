<?php

namespace App\Filament\Resources\CharteSocials\Pages;

use App\Filament\Resources\CharteSocials\CharteSocialResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCharteSocials extends ManageRecords
{
    protected static string $resource = CharteSocialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
