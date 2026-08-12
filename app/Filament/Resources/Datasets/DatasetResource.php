<?php

namespace App\Filament\Resources\Datasets;

use App\Filament\Resources\Datasets\Pages\CreateDataset;
use App\Filament\Resources\Datasets\Pages\EditDataset;
use App\Filament\Resources\Datasets\Pages\ListDatasets;
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

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::check() && (Auth::user()->isAdministrator() || Auth::user()->isDataOwner());
    }

    /**
     * Administrator sees every dataset. A data owner only sees the datasets
     * assigned to the Data Owner profile linked to their account.
     */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = Auth::user();

        if ($user?->isDataOwner()) {
            $query->where('data_owner_id', $user->data_owner_id);
        }

        return $query;
    }

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
            'index' => ListDatasets::route('/'),
            'create' => CreateDataset::route('/create'),
            'edit' => EditDataset::route('/{record}/edit'),
        ];
    }
}
