<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'position',
        'photo',
        'is_leader',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'is_leader' => 'boolean',
            'order'     => 'integer',
        ];
    }

    // ── Scopes ──────────────────────────────────────────────────────
    public function scopeOrdered($query)
    {
        return $query->orderByDesc('is_leader')->orderBy('order')->orderBy('name');
    }

    // ── Accessor: URL foto ───────────────────────────────────────────
    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }

        return 'https://placehold.co/600x800/e5e7eb/9ca3af?text=Photo';
    }
}
