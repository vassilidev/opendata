<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResponsablePublic extends Model
{
    public $timestamps = false;

    protected $table = 'responsables_publics';

    protected $fillable = [
        'activite_id',
        'text',
    ];

    public function activite(): BelongsTo
    {
        return $this->belongsTo(Activite::class);
    }
}
