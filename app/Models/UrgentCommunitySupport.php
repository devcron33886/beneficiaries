<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UrgentCommunitySupport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'national_id_number',
        'sector',
        'cell',
        'village',
        'phone_number',
        'support',
        'done_at',
    ];

    protected function casts(): array
    {
        return [
            'done_at' => 'date',
        ];
    }
}
