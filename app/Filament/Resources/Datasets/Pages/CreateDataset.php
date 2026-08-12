<?php

namespace App\Filament\Resources\Datasets\Pages;

use App\Filament\Resources\Datasets\DatasetResource;
use App\Models\DataOwner;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CreateDataset extends CreateRecord
{
    protected static string $resource = DatasetResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = Auth::user();

        if ($user?->isDataOwner()) {
            $dataOwner = $user->dataOwner;

            if (! $dataOwner) {
                throw ValidationException::withMessages([
                    'data_owner_id' => 'Akun ini belum terhubung ke profil Data Owner.',
                ]);
            }

            $data['data_owner_id'] = $dataOwner->id;
            $data['directorate_id'] = $dataOwner->directorate_id;
        } elseif (! empty($data['data_owner_id'])) {
            $dataOwner = DataOwner::findOrFail($data['data_owner_id']);
            $data['directorate_id'] = $dataOwner->directorate_id;
        }

        return $data;
    }
}
