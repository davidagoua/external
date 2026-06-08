<?php

namespace App\Filament\Resources\Employes\Pages;

use App\Filament\Resources\Employes\EmployeResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateEmploye extends CreateRecord
{
    protected static string $resource = EmployeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if(! session()->has('etablissement_id')){
            abort(400);
        }
        $data['etablissement_id'] = session()->get('etablissement_id')[0];

        $user = new User();
        $user->email = $data['email'];
        $user->name = $data['nom'] . ' ' . $data['prenoms'];
        $user->password = Hash::make('secret');
        $user->save();
        $data['user_id'] = $user->id;
        $data = collect($data)->except('email')->toArray();
        return parent::mutateFormDataBeforeCreate($data);
    }


}
