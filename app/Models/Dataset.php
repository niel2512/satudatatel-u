<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Dataset extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'description_detail',
        'directorate_id',
        'data_owner_id',
        'category_id',
        'data_format',
        'file_size',
        'status',
        'last_updated_at',
    ];

    protected function casts(): array
    {
        return [
            'last_updated_at' => 'date',
        ];
    }

    // ── Auto-generate slug ───────────────────────────────────────────
    protected static function booted(): void
    {
        static::creating(function (Dataset $dataset) {
            if (empty($dataset->slug)) {
                $dataset->slug = Str::slug($dataset->title);
            }
        });
    }

    // ── Relationships ────────────────────────────────────────────────
    public function directorate(): BelongsTo
    {
        return $this->belongsTo(Directorate::class);
    }

    public function dataOwner(): BelongsTo
    {
        return $this->belongsTo(DataOwner::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(DataCategory::class, 'category_id');
    }

    // ── Scopes ──────────────────────────────────────────────────────
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
