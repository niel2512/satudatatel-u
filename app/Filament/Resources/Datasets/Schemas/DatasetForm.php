<?php

namespace App\Filament\Resources\Datasets\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class DatasetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')
                ->label('Judul Dataset')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->label('Slug')
                ->maxLength(255)
                ->unique(ignoreRecord: true)
                ->helperText('Kosongkan agar dibuat otomatis dari judul.'),

            Textarea::make('description')
                ->label('Deskripsi Singkat')
                ->required()
                ->rows(3)
                ->maxLength(1000)
                ->columnSpanFull(),

            RichEditor::make('description_detail')
                ->label('Deskripsi Lengkap')
                ->columnSpanFull(),

            Select::make('data_owner_id')
                ->label('Data Owner')
                ->relationship('dataOwner', 'name')
                ->searchable()
                ->preload()
                ->required(fn (): bool => Auth::user()?->isAdministrator())
                ->visible(fn (): bool => Auth::user()?->isAdministrator()),

            Select::make('data_format')
                ->label('Format Data')
                ->options([
                    'CSV' => 'CSV',
                    'JSON' => 'JSON',
                    'Excel' => 'Excel',
                    'PDF' => 'PDF',
                    'Lainnya' => 'Lainnya',
                ]),

            TextInput::make('file_size')
                ->label('Ukuran Data')
                ->maxLength(20)
                ->placeholder('Contoh: 2.4 MB'),

            TextInput::make('download_url')
                ->label('Tautan Unduh')
                ->url()
                ->maxLength(2048)
                ->placeholder('https://...')
                ->helperText('Masukkan tautan file atau halaman akses dataset.'),

            Select::make('status')
                ->label('Status Publikasi')
                ->required()
                ->options([
                    'draft' => 'Draft',
                    'published' => 'Dipublikasikan',
                ])
                ->default('draft'),

            DatePicker::make('last_updated_at')
                ->label('Tanggal Pembaruan Terakhir'),
        ]);
    }
}
