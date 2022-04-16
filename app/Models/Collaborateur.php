<?php

namespace App\Models;

use App\Traits\BelongsToPublication;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{
    use BelongsToPublication;

    public $timestamps = false;

    protected $fillable = [
        'publication_id',
        'civilite',
        'nom',
        'prenom',
        'fonction',
    ];
}
