<?php

namespace App\Models;

use App\Traits\BelongsToPublication;
use Illuminate\Database\Eloquent\Model;

class ListSecteursActivite extends Model
{
    public $timestamps = false;

    use BelongsToPublication;

    protected $fillable = [
        'publication_id',
        'code',
        'label',
        'categorie',
        'ordre',
    ];

    protected $casts = [
        'ordre' => 'integer',
    ];
}
