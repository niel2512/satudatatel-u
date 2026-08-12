<?php

namespace App\Filament\Resources\Datasets\Pages;

use App\Filament\Resources\Datasets\DatasetResource;
use App\Models\DataOwner;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditDataset extends EditRecord
{
    protected static string $resource = DatasetResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $user = Auth::user();

        if ($user?->isDataOwner() && $user->dataOwner) {
            $data['data_owner_id'] = $user->dataOwner->id;
            $data['directorate_id'] = $user->dataOwner->directorate_id;
        } elseif (! empty($data['data_owner_id'])) {
            $dataOwner = DataOwner::findOrFail($data['data_owner_id']);
            $data['directorate_id'] = $dataOwner->directorate_id;
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
