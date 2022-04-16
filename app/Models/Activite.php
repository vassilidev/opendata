<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activite extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'exercice_id',
        'publicationDate',
        'identifiantFiche',
        'objet',
    ];

    protected $casts = [
        'publicationDate' => 'datetime',
    ];

    public function setPublicationDateAttribute($value)
    {
        $this->attributes['publicationDate'] = Carbon::createFromFormat('d/m/Y H:i:s', str_replace('à ', '', $value));
    }

    public function exercice(): BelongsTo
    {
        return $this->belongsTo(Exercice::class);
    }

    public function domainesInterventions(): HasMany
    {
        return $this->hasMany(DomainesIntervention::class);
    }

    public function reponsablesPublics(): HasMany
    {
        return $this->hasMany(ResponsablePublic::class);
    }

    public function decisionsConcernees(): HasMany
    {
        return $this->hasMany(DecisionsConcernee::class);
    }

    public function actionsMenees(): HasMany
    {
        return $this->hasMany(ActionsMenee::class);
    }

    public function tiers(): HasMany
    {
        return $this->hasMany(Tier::class);
    }

}
