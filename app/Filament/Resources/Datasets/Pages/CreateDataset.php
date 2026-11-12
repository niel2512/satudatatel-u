<?php

namespace App\Filament\Resources\Datasets\Pages;

use App\Filament\Resources\Datasets\DatasetResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateDataset extends CreateRecord
{
    protected static string $resource = DatasetResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::fillFileMetadata($data);
    }

    public static function fillFileMetadata(array $data): array
    {
        if (! empty($data['file_path'])) {
            $path = $data['file_path'];
            $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

            $data['data_format'] = match ($extension) {
                'csv'  => 'CSV',
                'xlsx' => 'Excel',
                'xls'  => 'Excel',
                default => strtoupper($extension),
            };

            if (Storage::disk('public')->exists($path)) {
                $bytes = Storage::disk('public')->size($path);
                $data['file_size'] = self::formatFileSize($bytes);
            }
        }

        return $data;
    }

    public static function formatFileSize(int $bytes): string
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
