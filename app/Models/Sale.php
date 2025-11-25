<?php

namespace App\Models;

use App\Services\EarningCalculator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    protected $table = 'invoices'; // Keep using invoices table for backward compatibility

    protected $fillable = [
        'invoice_number', // Will still use this field name
        'client_id',
        'stock_hub_id',
        'wallet_id',
        'subtotal',
        'tax_amount',
        'discount_amount',
        'total_amount',
        'currency',
        'status',
        'invoice_date',
        'due_date',
        'notes',
        'created_by',
        'confirmed_at',
        'paid_at',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'invoice_date' => 'date',
        'due_date' => 'date',
        'confirmed_at' => 'datetime',
        'paid_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sale) {
            if (!$sale->invoice_number) {
                $sale->invoice_number = 'SALE-' . date('Ymd') . '-' . strtoupper(uniqid());
            }
            if (!$sale->invoice_date) {
                $sale->invoice_date = now();
            }
            if (!$sale->currency) {
                $sale->currency = 'DZD';
            }
        });
    }

    public function items(): HasMany
    {
        return $this->hasMany(SaleItem::class, 'invoice_id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function stockHub(): BelongsTo
    {
        return $this->belongsTo(StockHub::class);
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function earnings(): HasMany
    {
        return $this->hasMany(Earning::class, 'sale_id');
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isConfirmed(): bool
    {
        return $this->status === 'confirmed';
    }

    public function isPaid(): bool
    {
        return $this->status === 'paid';
    }

    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }

    /**
     * Confirm the sale: deduct stock, credit wallet, and calculate earnings
     */
    public function confirm(): bool
    {
        if ($this->status !== 'pending') {
            return false;
        }

        if (!$this->wallet_id) {
            throw new \Exception("Wallet must be selected before confirming the sale.");
        }

        DB::beginTransaction();
        try {
            // 1. Deduct stock for each item
            foreach ($this->items as $item) {
                $stock = Stock::where('product_id', $item->product_id)
                    ->where('stock_hub_id', $this->stock_hub_id)
                    ->first();

                if (!$stock || $stock->quantity < $item->quantity) {
                    throw new \Exception("Insufficient stock for product: {$item->product->name}");
                }

                $stock->removeStock($item->quantity);
            }

            // 2. Credit the wallet
            $this->wallet->credit(
                $this->total_amount,
                "Sale #" . $this->invoice_number,
                "sale_{$this->id}"
            );

            // 3. Update sale status
            $this->update([
                'status' => 'confirmed',
                'confirmed_at' => now(),
            ]);

            // 4. Calculate and create earning records
            $earningCalculator = app(EarningCalculator::class);
            $earningCalculator->calculateFromSale($this);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Mark sale as paid
     */
    public function markAsPaid(): bool
    {
        if ($this->status !== 'confirmed') {
            return false;
        }

        return $this->update([
            'status' => 'paid',
            'paid_at' => now(),
        ]);
    }

    /**
     * Cancel the sale
     */
    public function cancel(): bool
    {
        if ($this->status === 'paid' || $this->status === 'confirmed') {
            return false;
        }

        return $this->update(['status' => 'cancelled']);
    }

    /**
     * Get sale number (alias for invoice_number)
     */
    public function getSaleNumberAttribute(): string
    {
        return $this->invoice_number;
    }
}
