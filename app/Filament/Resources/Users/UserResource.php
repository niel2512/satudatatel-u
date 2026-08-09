<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Schemas\UserInfolist;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Kelola Pengguna';

    protected static ?int $navigationSort = 99;

    protected static ?string $modelLabel = 'Pengguna';

    protected static ?string $pluralModelLabel = 'Pengguna';

    // ── Authorization: hanya super_admin yang boleh mengakses ────────

    /** Sembunyikan dari navigasi jika bukan super_admin */
    public static function shouldRegisterNavigation(): bool
    {
        return Auth::check() && Auth::user()->isSuperAdmin();
    }

    /** Blokir akses list */
    public static function canViewAny(): bool
    {
        return Auth::check() && Auth::user()->isSuperAdmin();
    }

    /** Blokir akses create */
    public static function canCreate(): bool
    {
        return Auth::check() && Auth::user()->isSuperAdmin();
    }

    /** Blokir akses view detail */
    public static function canView($record): bool
    {
        return Auth::check() && Auth::user()->isSuperAdmin();
    }

    /** Blokir akses edit */
    public static function canEdit($record): bool
    {
        return Auth::check() && Auth::user()->isSuperAdmin();
    }

    /** Blokir akses delete */
    public static function canDelete($record): bool
    {
        return Auth::check() && Auth::user()->isSuperAdmin();
    }

    /** Blokir akses delete banyak */
    public static function canDeleteAny(): bool
    {
        return Auth::check() && Auth::user()->isSuperAdmin();
    }

    // ────────────────────────────────────────────────────────────────

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'view'   => ViewUser::route('/{record}'),
            'edit'   => EditUser::route('/{record}/edit'),
        ];
    }
}
