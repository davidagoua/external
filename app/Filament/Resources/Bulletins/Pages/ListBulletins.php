<?php

namespace App\Filament\Resources\Bulletins\Pages;

use App\Filament\Resources\Bulletins\BulletinResource;
use App\Models\Bulletin;
use App\Models\Employe;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use function Illuminate\Support\months;

class ListBulletins extends ListRecords
{
    protected static string $resource = BulletinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('Generer')
                ->label("Générer mois")
                ->color('secondary')
                ->action(function () {
                    Employe::query()->each(function (Employe $employe) {
                       $employe->generate_bulletin();
                    });
                })
                ->successNotificationTitle("Bulletins générés")
        ];
    }

    public function getTabs(): array
    {
        return collect()->range(1,12)->map(function($item){
            return Tab::make(months($item)->format('%M'))->query(fn($query) => $query->whereMonth('created_at', $item));
        })->toArray();

    }

    public function getDefaultActiveTab() : int
    {
        return now()->month - 1;
    }
}
