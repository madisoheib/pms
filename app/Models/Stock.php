<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    protected $table = 'stock';

    protected $fillable = [
        'product_id',
        'stock_hub_id',
        'quantity',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function stockHub(): BelongsTo
    {
        return $this->belongsTo(StockHub::class);
    }

    public function addStock(int $quantity): void
    {
        $this->increment('quantity', $quantity);
    }

    public function removeStock(int $quantity): void
    {
        $this->decrement('quantity', $quantity);
    }
}
