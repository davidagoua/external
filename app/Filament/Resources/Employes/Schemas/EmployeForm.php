<?php

namespace App\Filament\Resources\Employes\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EmployeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nom')
                    ->required(),
                TextInput::make('prenoms')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                DatePicker::make('date_naissance')
                    ->required(),
                TextInput::make('lieu_naissance')
                    ->required(),
            ]);
    }


}
