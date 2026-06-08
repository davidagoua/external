<?php

namespace App\Filament\Resources\Etablissements;

use App\Filament\Resources\Etablissements\Pages\CreateEtablissement;
use App\Filament\Resources\Etablissements\Pages\EditEtablissement;
use App\Filament\Resources\Etablissements\Pages\ListEtablissements;
use App\Filament\Resources\Etablissements\Pages\ViewEtablissement;
use App\Filament\Resources\Etablissements\Schemas\EtablissementForm;
use App\Filament\Resources\Etablissements\Schemas\EtablissementInfolist;
use App\Filament\Resources\Etablissements\Tables\EtablissementsTable;
use App\Models\Etablissement;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EtablissementResource extends Resource
{
    protected static ?string $model = Etablissement::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?int $navigationSort = 30;

    protected static ?string $recordTitleAttribute = 'nom';
    //protected static string | UnitEnum | null $navigationGroup = "Général";

    public static function shouldRegisterNavigation(): bool
    {
        return ! session()->has('etablissement_id');
    }

    public static function form(Schema $schema): Schema
    {
        return EtablissementForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EtablissementInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EtablissementsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEtablissements::route('/'),
            'create' => CreateEtablissement::route('/create'),
            'view' => ViewEtablissement::route('/{record}'),
            'edit' => EditEtablissement::route('/{record}/edit'),
        ];
    }
}
