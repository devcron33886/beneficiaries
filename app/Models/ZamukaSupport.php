<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZamukaSupport extends Model
{
    use SoftDeletes;

    public function beneficiary(): BelongsTo
    {
        return $this->belongsTo(ZamukaBeneficiary::class);
    }
}
