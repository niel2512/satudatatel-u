<?php

namespace App\Filament\Resources\Datasets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DatasetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul Dataset')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->limit(60),

                TextColumn::make('directorate.name')
                    ->label('Direktorat')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('dataOwner.name')
                    ->label('Data Owner')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('data_format')
                    ->label('Format')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'CSV'   => 'success',
                        'JSON'  => 'info',
                        'Excel' => 'warning',
                        'PDF'   => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft'     => 'gray',
                        default     => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'published' => 'Published',
                        'draft'     => 'Draft',
                        default     => $state,
                    })
                    ->sortable(),

                TextColumn::make('last_updated_at')
                    ->label('Diperbarui')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'published' => 'Published',
                        'draft'     => 'Draft',
                    ]),

                SelectFilter::make('data_format')
                    ->label('Format')
                    ->options([
                        'CSV'   => 'CSV',
                        'JSON'  => 'JSON',
                        'Excel' => 'Excel',
                        'PDF'   => 'PDF',
                        'XML'   => 'XML',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
