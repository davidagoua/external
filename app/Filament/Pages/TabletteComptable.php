<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Pages\Page;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class TabletteComptable extends Page
{

    protected string $view = 'filament.pages.tablette-comptable';
    //protected static string | UnitEnum | null $navigationGroup = "Général";
    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedCalculator;
    protected static ?int $navigationSort = 40;

    public static function shouldRegisterNavigation(): bool
    {
        return ! session()->has('etablissement_id');
    }


    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('annee')
                ->default((int) date('Y'))
                ->numeric(),
            Select::make('mois')
                ->default(date('m'))
                ->options([1=>'1-Janvier',2=>'2-Fevrier',3=>'3-Mars',
                    4=>'4-Avril',5=>'5-Mai',6=>'6-Juin',
                    7=>'7-Juillet',8=>'8-Aôut',9=>'9-Septembre',
                    10=>'10-Octobre',11=>'11-Novembre',12=>'12-Decembre']),
            Tabs::make('tabs')->tabs([
                Tab::make('DSN Mensuelle')->schema([
                    Repeater::make('bulletins')
                        ->columns(5)
                        ->schema([
                        TextInput::make('libele'),
                        TextInput::make('montant')->numeric()
                            ->live()
                            ->afterStateUpdated(fn(Set $set, Get $get, $state) => $set('total', $state * $get['quantite'])),
                        TextInput::make('quantite')->numeric()
                            ->default(1)
                            ->live()
                            ->afterStateUpdated(fn(Set $set, Get $get, $state) => $set('total', $state * $get['montant'])),
                        TextInput::make('total')
                            ->disabled()
                            ->default(0)
                            ->numeric(),
                        Checkbox::make('actif'),
                    ])
                ]),
                Tab::make('DSN Fin de contrat')->schema([]),
                Tab::make('DSN arrêt de travail')->schema([]),
                Tab::make('BPIJ')->schema([]),
                Tab::make("DPAE déclaration d'embauche")->schema([]),
                Tab::make("DSN d'amorçage")->schema([]),
            ])->columnSpan(3)
        ])->columns(3);
    }

}
