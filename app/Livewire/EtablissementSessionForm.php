<?php

namespace App\Livewire;

use App\Filament\Resources\Employes\EmployeResource;
use App\Models\Etablissement;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Html;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EtablissementSessionForm extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public ?array $data = [];

    public function mount(): void
    {

        $this->form->fill([
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('current_etablissement_name')
                    ->disabled()
                    ->hiddenLabel(true),
                Select::make('etablissement_id')
                    ->hiddenLabel()
                    ->live()
                    ->options(request()->user()
                        ->assignEtablissements()
                        ->pluck('nom', 'id'))
                    ->searchable(),
            ])
            ->columns(2)
            ->inlineLabel(true)
            ->statePath('data');
    }



    public function submit(): void
    {
        $data = $this->form->getState();
        session()->put('etablissement_id', $data['etablissement_id']);
        Notification::make()->success()->title("Etablissement selectionné");
        redirect(EmployeResource::getIndexUrl());
    }

    public function render(): View
    {
        return view('livewire.etablissement-session-form');
    }
}
