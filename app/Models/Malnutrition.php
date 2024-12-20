<?php

namespace App\Models;

use App\Enums\GenderEnum;
use App\Enums\NutritionColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Malnutrition extends Model
{
    use SoftDeletes;

    protected $casts = ['gender' => GenderEnum::class, 'current_nutrition_color_code' => NutritionColor::class];

    protected $guarded = [];

    public function supports(): HasMany
    {
        return $this->hasMany(MalnutritionSupport::class);
    }

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
