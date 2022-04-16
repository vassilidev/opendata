<?php

namespace App\Models;

use App\Traits\BelongsToPublication;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exercice extends Model
{
    use BelongsToPublication;

    public $timestamps = false;

    protected $fillable = [
        'publication_id',
        'publicationDate',
        'dateDebut',
        'dateFin',
        'chiffreAffaire',
        'hasNotChiffreAffaire',
        'montantDepense',
        'nombreSalaries',
        'exerciceId',
        'noActivite',
        'nombreActivite',
        'defautDeclaration',
    ];

    protected $casts = [
        'publicationDate' => 'datetime:d/m/Y H:i:s',
        'dateDebut' => 'date',
        'dateFin' => 'date',
        'hasNotChiffreAffaire' => 'boolean',
        'nombreSalaries' => 'integer',
        'exerciceId' => 'integer',
        'noActivite' => 'boolean',
        'nombreActivite' => 'integer',
        'defautDeclaration' => 'boolean',
    ];

    public function setPublicationDateAttribute($value)
    {
        $this->attributes['publicationDate'] = Carbon::createFromFormat('d/m/Y H:i:s', str_replace('à ', '', $value));
    }

    public function activites(): HasMany
    {
        return $this->hasMany(Activite::class);
    }


}
