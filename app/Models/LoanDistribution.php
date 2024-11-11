<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanDistribution extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'member_id',
        'amount',
        'status',
        'notes',
        'credit_top_up_id',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Microcredit::class, 'member_id');
    }

    public function creditTopUp(): BelongsTo
    {
        return $this->belongsTo(CreditTopUp::class);
    }
}
