<?php

namespace App\Filament\Resources\Societes\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SocieteForm
{



    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informations Générales')
                    ->description('Informations d\'identification de la société')
                    ->schema([
                        TextInput::make('nom')
                            ->inlineLabel()
                            ->required(),
                        TextInput::make('sigle')
                            ->inlineLabel(),
                        FileUpload::make('logo')
                            ->inlineLabel()
                            ->image(),
                        DatePicker::make('date_creation')
                            ->inlineLabel(),
                        Textarea::make('description')
                            ->inlineLabel()
                            ->columnSpanFull(),
                        Select::make('type_societe')
                            ->inlineLabel()
                            ->searchable()
                            ->options([
                                'SARL' => 'SARL',
                                'SA' => 'SA',
                                'SUARL' => 'SUARL',
                                'SAS' => 'SAS',
                                'SI' => 'SI',
                                'SUP' => 'SUP'
                            ]),
                        Select::make('statut_juridique')
                            ->inlineLabel()
                            ->searchable()
                            ->options([]),
                        TextInput::make('secteur_activite')
                            ->inlineLabel(),
                        TextInput::make('rccm')
                            ->inlineLabel(),
                    ]),

                Section::make('Coordonnées')
                    ->description('Contacts et adresses de la société')
                    ->schema([
                        TextInput::make('adresse')
                            ->inlineLabel(),
                        TextInput::make('adresse_bulletin')
                            ->inlineLabel(),
                        TextInput::make('telephone')
                            ->inlineLabel()
                            ->tel(),
                        TextInput::make('email')
                            ->inlineLabel()
                            ->email(),
                        TextInput::make('fax')
                            ->inlineLabel(),
                        TextInput::make('site_web')
                            ->inlineLabel()
                            ->url(),
                    ]),

                Section::make('Informations Sociales (CNPS)')
                    ->description('Données relatives à la Caisse Nationale de Prévoyance Sociale')
                    ->schema([
                        TextInput::make('cnps_maticule_employeur')
                            ->inlineLabel()
                            ->label('Matricule employeur'),
                        TextInput::make('cnps_code_activite')
                            ->inlineLabel()
                            ->label('Code activité'),
                        TextInput::make('cnps_code_agence')
                            ->inlineLabel()
                            ->label('Code agence'),
                        TextInput::make('cnps_code_etablissement')
                            ->inlineLabel()
                            ->label('Code établissement'),
                        TextInput::make('cnps_agence_rattachement')
                            ->inlineLabel()
                            ->label('Agence de rattachement'),
                        TextInput::make('cnps_periodicite_paiement')
                            ->inlineLabel()
                            ->label('Périodicité de paiement'),
                        TextInput::make('cnps_periodicite_paiement_cmu')
                            ->inlineLabel()
                            ->label('Périodicité de paiement CMU'),
                    ]),

                Section::make('Informations Fiscales')
                    ->description('Données liées aux impôts')
                    ->schema([
                        TextInput::make('imp_ncontribuable')
                            ->inlineLabel()
                            ->label('N° Contribuable'),
                        TextInput::make('imp_centre')
                            ->inlineLabel()
                            ->label('Centre des impôts'),
                        TextInput::make('imp_periodicite_declaration')
                            ->inlineLabel()
                            ->label('Périodicité de déclaration'),
                        TextInput::make('imp_regime_fiscal')
                            ->inlineLabel()
                            ->label('Régime fiscal'),
                    ]),

                Section::make('Paramètres')
                    ->schema([
                        Select::make('charte_social_id')
                            ->inlineLabel()
                            ->relationship('charteSocial', 'nom')
                            ->required(),
                    ]),
            ]);
    }

}
