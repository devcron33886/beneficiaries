<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\GenderEnum;
use App\Enums\ScholarshipStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scholarship extends Model
{
    use SoftDeletes;

    protected $casts = ['gender' => GenderEnum::class, 'status' => ScholarshipStatus::class];

    protected $guarded = [];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function cell(): BelongsTo
    {
        return $this->belongsTo(Cell::class);
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }
}
