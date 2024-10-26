<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pasien extends Model
{
    use HasFactory;
    // Fachri
    protected $guarded = [];

    public function daftar(): HasMany
    {
        return $this->hasMany(Daftar::class);
    }
}