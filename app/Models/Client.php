<?php

namespace App\Models;

use App\Traits\BelongsToPublication;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use BelongsToPublication;

    public $timestamps = false;

    protected $fillable = [
        'denomination',
        'dateAjout',
        'ancienClient',
        'identifiantNational',
        'typeIdentifiantNational',
    ];

    protected $casts = [
        'ancienClient' => 'boolean',
        'dateAjout' => 'datetime:d-m-Y H:i'
    ];
}
