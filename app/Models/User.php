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
    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    public function isAdminPuTI(): bool
    {
        return $this->role === 'admin_puti';
    }

    public function isDataOwner(): bool
    {
        return $this->role === 'data_owner';
    }

    public function isAdmin(): bool
    {
        return in_array($this->role, ['super_admin', 'admin_puti']);
    }

    // ── Filament gate ────────────────────────────────────────────────
    public function canAccessPanel(Panel $panel): bool
    {
        // Semua role selain guest boleh masuk ke panel
        return in_array($this->role, ['super_admin', 'admin_puti', 'data_owner']);
    }
}
