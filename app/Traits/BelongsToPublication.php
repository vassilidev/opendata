<?php

namespace App\Traits;

use App\Models\Publication;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToPublication
{
    public function publication(): BelongsTo
    {
        return $this->belongsTo(Publication::class);
    }
}
