<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    // Konstanta role yang tersedia
    const ROLE_ADMINISTRATOR = 'administrator';
    const ROLE_DATA_OWNER    = 'data_owner';

    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // ── Role helpers ────────────────────────────────────────────────
    public function isAdministrator(): bool
    {
        return $this->role === self::ROLE_ADMINISTRATOR;
    }

    public function isDataOwner(): bool
    {
        return $this->role === self::ROLE_DATA_OWNER;
    }

    /**
     * Alias untuk kompatibilitas — UserResource masih memanggil isSuperAdmin()
     */
    public function isSuperAdmin(): bool
    {
        return $this->isAdministrator();
    }

    // ── Filament gate ────────────────────────────────────────────────
    public function canAccessPanel(Panel $panel): bool
    {
        return in_array($this->role, [self::ROLE_ADMINISTRATOR, self::ROLE_DATA_OWNER]);
    }
}
