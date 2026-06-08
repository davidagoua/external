<?php

namespace App\Filament\Resources\Societes;

use App\Filament\Resources\Societes\Pages\CreateSociete;
use App\Filament\Resources\Societes\Pages\EditSociete;
use App\Filament\Resources\Societes\Pages\ListSocietes;
use App\Filament\Resources\Societes\Schemas\SocieteForm;
use App\Filament\Resources\Societes\Tables\SocietesTable;
use App\Models\Societe;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SocieteResource extends Resource
{
    protected static ?string $model = Societe::class;
    protected static ?int $navigationSort = 20;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    //protected static string | UnitEnum | null $navigationGroup = "Général";
    protected static ?string $recordTitleAttribute = 'nom';

    public static function shouldRegisterNavigation(): bool
    {
        return ! session()->has('etablissement_id');
    }

    public static function form(Schema $schema): Schema
    {
        return SocieteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SocietesTable::configure($table);
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
            'index' => ListSocietes::route('/'),
            'create' => CreateSociete::route('/create'),
            'edit' => EditSociete::route('/{record}/edit'),
        ];
    }
}
