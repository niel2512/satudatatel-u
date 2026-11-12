<?php

namespace App\Filament\Resources\Datasets;

use App\Filament\Resources\Datasets\Pages\CreateDataset;
use App\Filament\Resources\Datasets\Pages\EditDataset;
use App\Filament\Resources\Datasets\Pages\ListDatasets;
use App\Filament\Resources\Datasets\Pages\ViewDataset;
use App\Filament\Resources\Datasets\Schemas\DatasetForm;
use App\Filament\Resources\Datasets\Tables\DatasetsTable;
use App\Models\Dataset;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class DatasetResource extends Resource
{
    protected static ?string $model = Dataset::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCircleStack;

    protected static ?string $navigationLabel = 'Dataset';

    protected static ?string $modelLabel = 'Dataset';

    protected static ?string $pluralModelLabel = 'Dataset';

    protected static ?int $navigationSort = 20;

    // ── KUNCI UTAMA: Filter query berdasarkan role ───────────────────
    /**
     * Administrator → melihat semua dataset.
     * Data Owner    → hanya dataset yang data_owner_id-nya milik dia.
     */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery()
            ->with(['directorate', 'dataOwner']);

        $user = Auth::user();

        if ($user->isDataOwner() && $user->dataOwner) {
            $query->where('data_owner_id', $user->dataOwner->id);
        }

        return $query;
    }

    // ── Otorisasi ────────────────────────────────────────────────────
    /** Semua user yang login boleh lihat menu ini */
    public static function canViewAny(): bool
    {
        return Auth::check();
    }

    /** Data Owner hanya bisa edit dataset miliknya (sudah dijamin query) */
    public static function canEdit($record): bool
    {
        $user = Auth::user();

        if ($user->isAdministrator()) {
            return true;
        }

        // Pastikan record ini milik data_owner yang login
        return $user->dataOwner?->id === $record->data_owner_id;
    }

    public static function canDelete($record): bool
    {
        return static::canEdit($record);
    }

    public static function canDeleteAny(): bool
    {
        return Auth::check();
    }

    // ────────────────────────────────────────────────────────────────

    public static function form(Schema $schema): Schema
    {
        return DatasetForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DatasetsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListDatasets::route('/'),
            'create' => CreateDataset::route('/create'),
            'view'   => ViewDataset::route('/{record}'),
            'edit'   => EditDataset::route('/{record}/edit'),
        ];
    }
}
