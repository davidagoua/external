<?php

namespace App\Filament\Resources\Bulletins\Pages;

use App\Filament\Resources\Bulletins\BulletinResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBulletin extends CreateRecord
{
    protected static string $resource = BulletinResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if(! session()->has('etablissement_id')){
            abort(400);
        }
        $data['etablissement_id'] = session()->get('etablissement_id')[0];

        return parent::mutateFormDataBeforeCreate($data);
    }
}
