<?php

namespace App\Filament\Resources\Greetings;

use App\Filament\Resources\Greetings\Pages\CreateGreeting;
use App\Filament\Resources\Greetings\Pages\EditGreeting;
use App\Filament\Resources\Greetings\Pages\ListGreetings;
use App\Filament\Resources\Greetings\Pages\ViewGreeting;
use App\Filament\Resources\Greetings\Schemas\GreetingForm;
use App\Filament\Resources\Greetings\Schemas\GreetingInfolist;
use App\Filament\Resources\Greetings\Tables\GreetingsTable;
use App\Models\Greeting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class GreetingResource extends Resource
{
    protected static ?string $model = Greeting::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static ?string $navigationLabel = 'Sambutan';

    protected static ?string $modelLabel = 'Sambutan';

    protected static ?string $pluralModelLabel = 'Sambutan';

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Konten';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return GreetingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GreetingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GreetingsTable::configure($table);
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
            'index' => ListGreetings::route('/'),
            'create' => CreateGreeting::route('/create'),
            'view' => ViewGreeting::route('/{record}'),
            'edit' => EditGreeting::route('/{record}/edit'),
        ];
    }
}
