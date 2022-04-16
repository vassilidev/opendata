<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Publication extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'typeIdentifiantNational',
        'denomination',
        'publierMonAdressePhysique',
        'codePostal',
        'ville',
        'pays',
        'publierMonAdresseEmail',
        'publierMonTelephoneDeContact',
        'lienSiteWeb',
        'lienPageTwitter',
        'lienPageFacebook',
        'lienPageLinkedin',
        'declarationTiers',
        'declarationOrgaAppartenance',
        'isActivitesPubliees',
        'identifiantNational',
        'datePremierePublication',
        'dateCreation',
        'dateDernierePublicationActivite',
    ];

    protected $casts = [
        'publierMonAdressePhysique' => 'boolean',
        'codePostal' => 'integer',
        'publierMonAdresseEmail' => 'boolean',
        'publierMonTelephoneDeContact' => 'boolean',
        'declarationTiers' => 'boolean',
        'declarationOrgaAppartenance' => 'boolean',
        'isActivitesPubliees' => 'boolean',
        'datePremierePublication' => 'datetime:d/m/Y H:i:s',
        'dateCreation' => 'datetime:d/m/Y H:i:s',
        'dateDernierePublicationActivite' => 'datetime:d/m/Y H:i:s',
    ];

    public function setDatePremierePublicationAttribute($value)
    {
        $this->attributes['datePremierePublication'] = Carbon::createFromFormat('d/m/Y H:i:s', $value);;
    }

    public function setDateCreationAttribute($value)
    {
        $this->attributes['dateCreation'] = Carbon::createFromFormat('d/m/Y H:i:s', $value);;
    }

    public function setDateDernierePublicationActiviteAttribute($value)
    {
        $this->attributes['dateDernierePublicationActivite'] = Carbon::createFromFormat('d/m/Y H:i:s', $value);
    }

    public function categorieOrganisation(): HasOne
    {
        return $this->hasOne(CategorieOrganisation::class);
    }

    public function dirigeants(): HasMany
    {
        return $this->hasMany(Dirigeant::class);
    }

    public function collaborateurs(): HasMany
    {
        return $this->hasMany(Collaborateur::class);
    }

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function listSecteursActivites(): HasMany
    {
        return $this->hasMany(ListSecteursActivite::class);
    }

    public function listNiveauInterventions(): HasMany
    {
        return $this->hasMany(ListNiveauIntervention::class);
    }

    public function exercices(): HasMany
    {
        return $this->hasMany(Exercice::class);
    }
}
