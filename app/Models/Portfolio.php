<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    protected $fillable = [
        'user_id',
        'crypto_id',
        'quantity',
        'average_price',
        'total_invested',
    ];

    protected $casts = [
        'quantity' => 'decimal:8',
        'average_price' => 'decimal:8',
        'total_invested' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function crypto(): BelongsTo
    {
        return $this->belongsTo(Crypto::class);
    }
}
