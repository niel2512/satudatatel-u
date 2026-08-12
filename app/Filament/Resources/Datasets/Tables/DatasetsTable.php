<?php

namespace App\Filament\Resources\Datasets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DatasetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Judul Dataset')->searchable()->sortable()->wrap(),
                TextColumn::make('directorate.name')->label('Direktorat')->searchable()->sortable(),
                TextColumn::make('dataOwner.name')->label('Data Owner')->searchable()->toggleable(),
                TextColumn::make('data_format')->label('Format')->placeholder('-'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => $state === 'published' ? 'success' : 'gray')
                    ->formatStateUsing(fn (string $state): string => $state === 'published' ? 'Dipublikasikan' : 'Draft'),
                TextColumn::make('last_updated_at')->label('Diperbarui')->date('d M Y')->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')->label('Status')->options([
                    'draft' => 'Draft',
                    'published' => 'Dipublikasikan',
                ]),
                SelectFilter::make('directorate_id')->label('Direktorat')->relationship('directorate', 'name'),
            ])
            ->recordActions([EditAction::make(), DeleteAction::make()])
            ->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])])
            ->defaultSort('updated_at', 'desc');
    }
}
