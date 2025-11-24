<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransitReceipt extends Model
{
    protected $fillable = [
        'order_id',
        'quantity_received',
        'quantity_discrepancy',
        'notes',
        'received_by',
        'received_at',
    ];

    protected $casts = [
        'quantity_received' => 'integer',
        'quantity_discrepancy' => 'integer',
        'received_at' => 'datetime',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function receivedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'received_by');
    }
}
