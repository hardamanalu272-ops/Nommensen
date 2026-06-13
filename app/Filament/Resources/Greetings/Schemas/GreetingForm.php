<?php

namespace App\Filament\Resources\Greetings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class GreetingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                RichEditor::make('content')
                    ->label('Isi Sambutan')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Foto Pimpinan')
                    ->image()
                    ->directory('greetings')
                    ->disk('public')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
