<?php

namespace App\Filament\Resources\Cooperations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class CooperationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->label('Logo Kerja Sama')
                    ->image()
                    ->directory('cooperations')
                    ->disk('public')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
