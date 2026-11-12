<?php

namespace App\Filament\Resources\Datasets\Schemas;

use App\Models\DataCategory;
use App\Models\DataOwner;
use App\Models\Directorate;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DatasetForm
{
    public static function configure(Schema $schema): Schema
    {
        $user = Auth::user();

        return $schema
            ->columns(2)
            ->components([

                TextInput::make('title')
                    ->label('Judul Dataset')
                    ->required()
                    ->maxLength(200)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    )
                    ->columnSpanFull(),

                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required()
                    ->maxLength(200)
                    ->disabled()
                    ->dehydrated()
                    ->helperText('Otomatis diisi dari judul.'),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft'     => 'Draft',
                        'published' => 'Published',
                    ])
                    ->default('draft')
                    ->required()
                    ->native(false),

                Select::make('directorate_id')
                    ->label('Direktorat')
                    ->options(function () use ($user) {
                        if ($user->isDataOwner() && $user->dataOwner) {
                            return Directorate::where('id', $user->dataOwner->directorate_id)
                                ->pluck('name', 'id');
                        }
                        return Directorate::ordered()->pluck('name', 'id');
                    })
                    ->default(function () use ($user) {
                        return $user->isDataOwner()
                            ? $user->dataOwner?->directorate_id
                            : null;
                    })
                    ->disabled(fn () => $user->isDataOwner())
                    ->dehydrated()
                    ->required()
                    ->searchable()
                    ->native(false),

                Select::make('data_owner_id')
                    ->label('Data Owner')
                    ->options(function () use ($user) {
                        if ($user->isDataOwner() && $user->dataOwner) {
                            return DataOwner::where('id', $user->dataOwner->id)
                                ->pluck('name', 'id');
                        }
                        return DataOwner::active()->with('directorate')
                            ->get()
                            ->mapWithKeys(fn ($do) => [
                                $do->id => $do->name . ' (' . ($do->directorate?->name ?? '-') . ')'
                            ]);
                    })
                    ->default(function () use ($user) {
                        return $user->isDataOwner() ? $user->dataOwner?->id : null;
                    })
                    ->disabled(fn () => $user->isDataOwner())
                    ->dehydrated()
                    ->searchable()
                    ->native(false),

                Select::make('category_id')
                    ->label('Kategori Data')
                    ->options(DataCategory::pluck('name', 'id'))
                    ->searchable()
                    ->native(false),

                DatePicker::make('last_updated_at')
                    ->label('Tanggal Terakhir Diperbarui')
                    ->default(now()),

                Textarea::make('description')
                    ->label('Deskripsi Singkat')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('description_detail')
                    ->label('Deskripsi Detail')
                    ->rows(5)
                    ->columnSpanFull(),

                FileUpload::make('file_path')
                    ->label('File Dataset')
                    ->directory('datasets')
                    ->acceptedFileTypes([
                        'text/csv',
                        'text/plain',
                        'application/csv',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ])
                    ->maxSize(51200) // 50MB
                    ->helperText('Upload file CSV atau XLSX (maks 50MB). Format & ukuran file akan terisi otomatis.')
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            // $state bisa berupa TemporaryUploadedFile atau string path
                            if (is_string($state)) {
                                $extension = strtolower(pathinfo($state, PATHINFO_EXTENSION));
                                $bytes = \Illuminate\Support\Facades\Storage::disk('public')->size($state);
                            } else {
                                $extension = strtolower($state->getClientOriginalExtension());
                                $bytes = $state->getSize();
                            }

                            $format = match ($extension) {
                                'csv'  => 'CSV',
                                'xlsx' => 'Excel',
                                'xls'  => 'Excel',
                                default => strtoupper($extension),
                            };
                            $set('data_format', $format);
                            $set('file_size', self::formatFileSize($bytes));
                        }
                    })
                    ->live()
                    ->columnSpanFull(),

                TextInput::make('data_format')
                    ->label('Format Data')
                    ->disabled()
                    ->dehydrated()
                    ->helperText('Otomatis terisi dari file yang diupload.'),

                TextInput::make('file_size')
                    ->label('Ukuran File')
                    ->disabled()
                    ->dehydrated()
                    ->helperText('Otomatis terisi dari file yang diupload.'),
            ]);
    }

    /**
     * Format bytes ke ukuran yang mudah dibaca.
     */
    private static function formatFileSize(int $bytes): string
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        }
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }

        return $bytes . ' B';
    }
}
