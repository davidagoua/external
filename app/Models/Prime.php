<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prime extends Model
{
    protected $guarded = [];

    public function typePrime(): BelongsTo
    {
        return $this->belongsTo(TypePrime::class);
    }

    public function bulletin(): BelongsTo
    {
        return $this->belongsTo(Bulletin::class);
    }
}
