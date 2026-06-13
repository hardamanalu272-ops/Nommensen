<?php

namespace App\Filament\Resources\Cooperations;

use App\Filament\Resources\Cooperations\Pages\CreateCooperation;
use App\Filament\Resources\Cooperations\Pages\EditCooperation;
use App\Filament\Resources\Cooperations\Pages\ListCooperations;
use App\Filament\Resources\Cooperations\Pages\ViewCooperation;
use App\Filament\Resources\Cooperations\Schemas\CooperationForm;
use App\Filament\Resources\Cooperations\Schemas\CooperationInfolist;
use App\Filament\Resources\Cooperations\Tables\CooperationsTable;
use App\Models\Cooperation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CooperationResource extends Resource
{
    protected static ?string $model = Cooperation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Kerja Sama';

    protected static ?string $modelLabel = 'Kerja Sama';

    protected static ?string $pluralModelLabel = 'Kerja Sama';

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Konten';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return CooperationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CooperationsTable::configure($table);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CooperationInfolist::configure($schema);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCooperations::route('/'),
            'create' => CreateCooperation::route('/create'),
            'view' => ViewCooperation::route('/{record}'),
            'edit' => EditCooperation::route('/{record}/edit'),
        ];
    }
}