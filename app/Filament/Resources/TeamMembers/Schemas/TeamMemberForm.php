<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('photo')
                    ->label('Foto Anggota')
                    ->image()
                    ->disk('public')
                    ->directory('team')
                    ->imageEditor()
                    ->maxSize(2048)
                    ->helperText('Format: JPG/PNG. Maks 2MB. Rasio ideal: 3:4 (portrait).')
                    ->columnSpanFull(),

                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(100),

                TextInput::make('position')
                    ->label('Jabatan')
                    ->required()
                    ->maxLength(100)
                    ->placeholder('contoh: Back End Developer'),

                TextInput::make('order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->helperText('Angka kecil tampil lebih dulu.'),

                Toggle::make('is_leader')
                    ->label('Ketua Tim (tampil lebih besar di bagian atas)')
                    ->default(false),
            ]);
    }
}
