<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Crypto extends Model
{
    protected $fillable = [
        'symbol',
        'name',
        'price',
        'change_24h',
        'volume_24h',
        'market_cap',
        'high_24h',
        'low_24h',
        'circulating_supply',
        'total_supply',
        'rank',
        'logo_url',
    ];

    protected $casts = [
        'price' => 'decimal:8',
        'change_24h' => 'decimal:2',
        'volume_24h' => 'decimal:2',
        'market_cap' => 'decimal:2',
        'high_24h' => 'decimal:8',
        'low_24h' => 'decimal:8',
        'circulating_supply' => 'decimal:2',
        'total_supply' => 'decimal:2',
    ];

    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
