<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'total_price',
        'country_origin',
        'supplier_id',
        'client_id',
        'wallet_id',
        'stock_hub_id',
        'delivery_date_expected',
        'status',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'delivery_date_expected' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (!$order->order_number) {
                $order->order_number = 'ORD-' . strtoupper(uniqid());
            }
        });
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    public function stockHub(): BelongsTo
    {
        return $this->belongsTo(StockHub::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function transitReceipt(): HasOne
    {
        return $this->hasOne(TransitReceipt::class);
    }

    public function losses(): HasMany
    {
        return $this->hasMany(Loss::class);
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isInTransit(): bool
    {
        return $this->status === 'in_transit';
    }

    public function isReceived(): bool
    {
        return $this->status === 'received';
    }

    public function isConfirmed(): bool
    {
        return $this->status === 'confirmed';
    }

    public function markAsInTransit(): void
    {
        $this->update(['status' => 'in_transit']);
    }

    public function markAsReceived(): void
    {
        $this->update(['status' => 'received']);
    }

    public function markAsConfirmed(): void
    {
        $this->update(['status' => 'confirmed']);
    }
}
