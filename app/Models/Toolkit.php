<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Toolkit extends Model
{
    use SoftDeletes;

    protected $casts = [
        'gender' => GenderEnum::class,
    ];
}
