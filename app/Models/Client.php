<?php

namespace App\Models;

use App\Traits\BelongsToPublication;
use Carbon\Carbon;
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
        'dateAjout' => 'datetime:d/m/Y H:i'
    ];

    public function setDateAjoutAttribute($value)
    {
        $this->attributes['dateAjout'] = Carbon::createFromFormat('d-m-Y H:i', str_replace('à ', '', $value));
    }
}
