<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function datasets(): HasMany
    {
        return $this->hasMany(Dataset::class, 'category_id');
    }
}
