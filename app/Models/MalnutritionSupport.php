<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MalnutritionSupport extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function malnutrition(): BelongsTo
    {
        return $this->belongsTo(Malnutrition::class);
    }
}
