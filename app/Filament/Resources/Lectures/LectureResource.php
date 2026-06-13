<?php

namespace App\Filament\Resources\Lectures;

use App\Models\Lecture;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Lectures\Pages\ListLectures;
use App\Filament\Resources\Lectures\Pages\CreateLecture;
use App\Filament\Resources\Lectures\Pages\EditLecture;
use BackedEnum;
use UnitEnum;

class LectureResource extends Resource
{
    protected static ?string $model = Lecture::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-academic-cap';
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen SDM';
    protected static ?string $navigationLabel = 'Dosen';
    protected static ?string $modelLabel = 'Dosen';
    protected static ?string $pluralModelLabel = 'Dosen';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: Dr. Ahmad Sutarno, M.Kom.'),

                Forms\Components\TextInput::make('nidn')
                    ->label('NIDN')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: 0123456789')
                    ->helperText('Nomor Induk Dosen Nasional (10 digit).'),

                Forms\Components\TextInput::make('pendidikan')
                    ->label('Riwayat Pendidikan')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: S3 Teknik Informatika — Universitas Indonesia'),

                Forms\Components\TextInput::make('jabatan')
                    ->label('Jabatan Fungsional')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: Lektor Kepala'),

                Forms\Components\TextInput::make('email')
                    ->label('Email Dosen')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: ahmad@b-university.ac.id')
                    ->helperText('Email aktif untuk komunikasi resmi.'),

                Forms\Components\TextInput::make('topik')
                    ->label('Topik / Bidang Keahlian')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: Machine Learning, Data Mining'),

                Forms\Components\FileUpload::make('image')
                    ->label('Foto Dosen')
                    ->image()
                    ->directory('lectures')
                    ->visibility('public')
                    ->imagePreviewHeight('200')
                    ->maxSize(2048)
                    ->required()
                    ->helperText('Upload foto formal dosen. Format: JPG, PNG. Maks 2MB.')
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->disk('public')
                    ->height(60)
                    ->circular(),

                TextColumn::make('nama')
                    ->label('Nama Dosen')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('nidn')
                    ->label('NIDN')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('NIDN disalin!')
                    ->toggleable(),

                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success'),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Email disalin!')
                    ->icon('heroicon-o-envelope'),

                TextColumn::make('topik')
                    ->label('Bidang Keahlian')
                    ->searchable()
                    ->limit(40)
                    ->tooltip(fn (?string $state): ?string => $state)
                    ->toggleable(),

                TextColumn::make('pendidikan')
                    ->label('Pendidikan')
                    ->searchable()
                    ->limit(40)
                    ->tooltip(fn (?string $state): ?string => $state)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('nama', 'asc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLectures::route('/'),
            'create' => CreateLecture::route('/create'),
            'edit' => EditLecture::route('/{record}/edit'),
        ];
    }
}