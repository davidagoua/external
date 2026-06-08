<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Etablissement extends Model
{
    protected $guarded = [];

    public function societe(): BelongsTo
    {
        return $this->belongsTo(Societe::class);
    }

    public function employes(): HasMany
    {
        return $this->hasMany(Employe::class);
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }
}
