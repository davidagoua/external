<?php

namespace App\Filament\Resources\Bulletins;

use App\Filament\Resources\Bulletins\Pages\CreateBulletin;
use App\Filament\Resources\Bulletins\Pages\EditBulletin;
use App\Filament\Resources\Bulletins\Pages\ListBulletins;
use App\Filament\Resources\Bulletins\Pages\ViewBulletin;
use App\Filament\Resources\Bulletins\Schemas\BulletinForm;
use App\Filament\Resources\Bulletins\Schemas\BulletinInfolist;
use App\Filament\Resources\Bulletins\Tables\BulletinsTable;
use App\Models\Bulletin;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BulletinResource extends Resource
{
    protected static ?string $model = Bulletin::class;
    //protected static string | UnitEnum | null $navigationGroup = "Etablissement";
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedReceiptPercent;
    protected static ?int $navigationSort = 30;
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
        return BulletinForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BulletinInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BulletinsTable::configure($table);
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
            'index' => ListBulletins::route('/'),
            'create' => CreateBulletin::route('/create'),
            'view' => ViewBulletin::route('/{record}'),
            'edit' => EditBulletin::route('/{record}/edit'),
        ];
    }
}
