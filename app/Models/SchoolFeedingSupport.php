<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolFeedingSupport extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function schoolFeeding(): BelongsTo
    {
        return $this->belongsTo(SchoolFeeding::class);
    }
}
