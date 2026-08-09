<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Directorate extends Model
{
    protected $fillable = [
        'name',
        'abbreviation',
        'logo',
        'description',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
        ];
    }

    // ── Relationships ────────────────────────────────────────────────
    public function dataOwners(): HasMany
    {
        return $this->hasMany(DataOwner::class);
    }

    public function datasets(): HasMany
    {
        return $this->hasMany(Dataset::class);
    }

    // ── Scopes ──────────────────────────────────────────────────────
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('name');
    }
}
