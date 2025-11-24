<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExchangeRate extends Model
{
    protected $fillable = [
        'from_currency',
        'to_currency',
        'rate',
        'is_active',
        'notes',
        'effective_date',
    ];

    protected $casts = [
        'rate' => 'decimal:8',
        'is_active' => 'boolean',
        'effective_date' => 'datetime',
    ];

    /**
     * Get the wallet transfers using this exchange rate
     */
    public function walletTransfers(): HasMany
    {
        return $this->hasMany(WalletTransfer::class);
    }

    /**
     * Get the active exchange rate for a currency pair
     */
    public static function getRate(string $fromCurrency, string $toCurrency): ?float
    {
        // If same currency, rate is 1
        if ($fromCurrency === $toCurrency) {
            return 1.0;
        }

        $rate = self::where('from_currency', $fromCurrency)
            ->where('to_currency', $toCurrency)
            ->where('is_active', true)
            ->orderBy('effective_date', 'desc')
            ->first();

        return $rate ? (float) $rate->rate : null;
    }

    /**
     * Convert amount from one currency to another
     */
    public static function convert(float $amount, string $fromCurrency, string $toCurrency): ?float
    {
        $rate = self::getRate($fromCurrency, $toCurrency);

        if ($rate === null) {
            return null;
        }

        return round($amount * $rate, 2);
    }

    /**
     * Get the inverse rate (to_currency to from_currency)
     */
    public function getInverseRateAttribute(): float
    {
        return 1 / (float) $this->rate;
    }

    /**
     * Scope to get only active rates
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
