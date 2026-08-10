<?php

namespace App\Filament\Resources\TeamMembers;

use App\Filament\Resources\TeamMembers\Pages\CreateTeamMember;
use App\Filament\Resources\TeamMembers\Pages\EditTeamMember;
use App\Filament\Resources\TeamMembers\Pages\ListTeamMembers;
use App\Filament\Resources\TeamMembers\Schemas\TeamMemberForm;
use App\Filament\Resources\TeamMembers\Tables\TeamMembersTable;
use App\Models\TeamMember;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static ?string $navigationLabel = 'Tim Pengembang';

    protected static ?string $modelLabel = 'Anggota Tim';

    protected static ?string $pluralModelLabel = 'Tim Pengembang';

    protected static ?int $navigationSort = 10;

    // ── Authorization: hanya administrator ──────────────────────────
    public static function shouldRegisterNavigation(): bool
    {
        return Auth::check() && Auth::user()->isAdministrator();
    }

    public static function canViewAny(): bool
    {
        return Auth::check() && Auth::user()->isAdministrator();
    }

    public static function canCreate(): bool
    {
        return Auth::check() && Auth::user()->isAdministrator();
    }

    public static function canEdit($record): bool
    {
        return Auth::check() && Auth::user()->isAdministrator();
    }

    public static function canDelete($record): bool
    {
        return Auth::check() && Auth::user()->isAdministrator();
    }

    public static function canDeleteAny(): bool
    {
        return Auth::check() && Auth::user()->isAdministrator();
    }

    // ────────────────────────────────────────────────────────────────

    public static function form(Schema $schema): Schema
    {
        return TeamMemberForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TeamMembersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListTeamMembers::route('/'),
            'create' => CreateTeamMember::route('/create'),
            'edit'   => EditTeamMember::route('/{record}/edit'),
        ];
    }
}
