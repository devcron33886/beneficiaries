<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vsla extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function members(): HasMany
    {
        return $this->hasMany(Microcredit::class);
    }

    public function topUps(): HasMany
    {
        return $this->hasMany(CreditTopUp::class);
    }
}
