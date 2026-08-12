<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Alamat Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Select::make('role')
                    ->label('Role / Peran')
                    ->required()
                    ->options([
                        'administrator' => 'Administrator',
                        'data_owner'    => 'Data Owner',
                    ])
                    ->default('data_owner')
                    ->native(false),

                Select::make('data_owner_id')
                    ->label('Profil Data Owner')
                    ->relationship('dataOwner', 'name')
                    ->searchable()
                    ->preload()
                    ->visible(fn (callable $get): bool => $get('role') === 'data_owner')
                    ->required(fn (callable $get): bool => $get('role') === 'data_owner')
                    ->helperText('Pilih profil Data Owner yang diwakili oleh akun ini.'),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->revealable()
                    ->dehydrateStateUsing(fn(string $state): string => bcrypt($state))
                    ->dehydrated(fn(?string $state): bool => filled($state))
                    ->required(fn(string $operation): bool => $operation === 'create')
                    ->helperText('Kosongkan jika tidak ingin mengubah password (saat edit).')
                    ->minLength(8),
            ]);
    }
}
