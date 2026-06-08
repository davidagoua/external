<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Societe extends Model
{
    protected $guarded = [];

    public function charteSocial(): BelongsTo
    {
        return $this->belongsTo(CharteSocial::class);
    }

    public function etablissements(): HasMany
    {
        return $this->hasMany(Etablissement::class);
    }
}
