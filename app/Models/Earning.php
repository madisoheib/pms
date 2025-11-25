<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Earning extends Model
{
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity_sold',
        'purchase_price_per_unit',
        'sale_price_per_unit',
        'total_cost',
        'total_revenue',
        'profit_amount',
        'profit_percentage',
        'currency',
        'notes',
    ];

    protected $casts = [
        'quantity_sold' => 'integer',
        'purchase_price_per_unit' => 'decimal:2',
        'sale_price_per_unit' => 'decimal:2',
        'total_cost' => 'decimal:2',
        'total_revenue' => 'decimal:2',
        'profit_amount' => 'decimal:2',
        'profit_percentage' => 'decimal:2',
    ];

    /**
     * Get the sale that this earning belongs to.
     */
    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }

    /**
     * Get the product that this earning belongs to.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the profit margin (profit as percentage of revenue).
     */
    public function getProfitMarginAttribute(): float
    {
        if ($this->total_revenue == 0) {
            return 0;
        }

        return ($this->profit_amount / $this->total_revenue) * 100;
    }

    /**
     * Get the ROI (Return on Investment).
     */
    public function getRoiAttribute(): float
    {
        if ($this->total_cost == 0) {
            return 0;
        }

        return ($this->profit_amount / $this->total_cost) * 100;
    }
}
