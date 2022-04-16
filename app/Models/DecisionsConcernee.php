<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DecisionsConcernee extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'activite_id',
        'text',
    ];

    public function activite(): BelongsTo
    {
        return $this->belongsTo(Activite::class);
    }
}
