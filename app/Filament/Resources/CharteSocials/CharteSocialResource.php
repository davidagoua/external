<?php

namespace App\Filament\Resources\CharteSocials;

use App\Filament\Resources\CharteSocials\Pages\ManageCharteSocials;
use App\Models\CharteSocial;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class CharteSocialResource extends Resource
{
    protected static ?string $model = CharteSocial::class;

    //protected static string | UnitEnum | null $navigationGroup = 'Général';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nom';

    public static function shouldRegisterNavigation(): bool
    {
        return ! session()->has('etablissement_id');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nom')
                    ->required()
                    ->maxLength(255),
                TextInput::make('description')->required(),
                TextInput::make('lien')->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nom'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nom')
            ->columns([
                TextColumn::make('nom')
                    ->searchable(),
                TextColumn::make('description'),
                TextColumn::make('lien')->badge()
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageCharteSocials::route('/'),
        ];
    }
}
