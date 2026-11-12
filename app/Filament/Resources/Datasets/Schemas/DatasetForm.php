<?php

namespace App\Filament\Resources\Datasets\Schemas;

use App\Models\DataCategory;
use App\Models\DataOwner;
use App\Models\Directorate;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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

                // ── Judul ──────────────────────────────────────────
                TextInput::make('title')
                    ->label('Judul Dataset')
                    ->required()
                    ->maxLength(200)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    )
                    ->columnSpanFull(),

                // ── Slug (readonly) ─────────────────────────────────
                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required()
                    ->maxLength(200)
                    ->disabled()
                    ->dehydrated()
                    ->helperText('Otomatis diisi dari judul.'),

                // ── Status ──────────────────────────────────────────
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft'     => 'Draft',
                        'published' => 'Published',
                    ])
                    ->default('draft')
                    ->required()
                    ->native(false),

                // ── Direktorat ──────────────────────────────────────
                Select::make('directorate_id')
                    ->label('Direktorat')
                    ->options(function () use ($user) {
                        // data_owner hanya bisa pilih direktorat miliknya
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

                // ── Data Owner ──────────────────────────────────────
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

                // ── Kategori ────────────────────────────────────────
                Select::make('category_id')
                    ->label('Kategori Data')
                    ->options(DataCategory::pluck('name', 'id'))
                    ->searchable()
                    ->native(false),

                // ── Format ──────────────────────────────────────────
                Select::make('data_format')
                    ->label('Format Data')
                    ->options([
                        'CSV'   => 'CSV',
                        'JSON'  => 'JSON',
                        'Excel' => 'Excel',
                        'PDF'   => 'PDF',
                        'XML'   => 'XML',
                    ])
                    ->native(false),

                // ── Ukuran file ─────────────────────────────────────
                TextInput::make('file_size')
                    ->label('Ukuran File')
                    ->placeholder('contoh: 2.4 MB')
                    ->maxLength(20),

                // ── Tanggal update ──────────────────────────────────
                DatePicker::make('last_updated_at')
                    ->label('Tanggal Terakhir Diperbarui')
                    ->default(now()),

                // ── Deskripsi singkat ───────────────────────────────
                Textarea::make('description')
                    ->label('Deskripsi Singkat')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),

                // ── Deskripsi detail ────────────────────────────────
                Textarea::make('description_detail')
                    ->label('Deskripsi Detail')
                    ->rows(5)
                    ->columnSpanFull(),

                // ── URL Download ─────────────────────────────────────
                TextInput::make('download_url')
                    ->label('URL Download / Link File')
                    ->url()
                    ->maxLength(2048)
                    ->placeholder('https://...')
                    ->columnSpanFull(),
            ]);
    }
}
