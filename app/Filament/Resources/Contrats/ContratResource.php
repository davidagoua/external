<?php

namespace App\Filament\Resources\Contrats;

use App\Filament\Resources\Contrats\Pages\CreateContrat;
use App\Filament\Resources\Contrats\Pages\EditContrat;
use App\Filament\Resources\Contrats\Pages\ListContrats;
use App\Filament\Resources\Contrats\Pages\ViewContrat;
use App\Filament\Resources\Contrats\Schemas\ContratForm;
use App\Filament\Resources\Contrats\Schemas\ContratInfolist;
use App\Filament\Resources\Contrats\Tables\ContratsTable;
use App\Models\Contrat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ContratResource extends Resource
{
    protected static ?string $model = Contrat::class;
    //protected static string | UnitEnum | null $navigationGroup = "Etablissement";
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?int $navigationSort = 20;
    protected static ?string $recordTitleAttribute = 'libele';


    public static function getNavigationBadge(): ?string
    {
        return self::getEloquentQuery()->count();
    }

    public static function shouldRegisterNavigation(): bool
    {
        return session()->has('etablissement_id');
    }

    public static function form(Schema $schema): Schema
    {
        return ContratForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ContratInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContratsTable::configure($table);
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
            'index' => ListContrats::route('/'),
            'create' => CreateContrat::route('/create'),
            'view' => ViewContrat::route('/{record}'),
            'edit' => EditContrat::route('/{record}/edit'),
        ];
    }
}
