<?php

namespace App\Models;

use App\Enums\EcdGrade;
use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EcdBeneficiary extends Model
{
    use SoftDeletes;

    protected $casts = ['gender' => GenderEnum::class,'grade'=>EcdGrade::class];

    protected $guarded = [];
}
