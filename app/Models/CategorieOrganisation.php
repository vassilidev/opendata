<?php

namespace App\Models;

use App\Traits\BelongsToPublication;
use Illuminate\Database\Eloquent\Model;

class CategorieOrganisation extends Model
{
    use BelongsToPublication;

    public $timestamps = false;

    protected $fillable = [
        'publication_id',
        'code',
        'label',
        'categorie',
        'notifSansChiffreAffaire',
    ];

    protected $casts = [
        'notifSansChiffreAffaire' => 'boolean',
    ];
}
