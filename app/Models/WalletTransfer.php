<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class WalletTransfer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transfer_number',
        'from_wallet_id',
        'from_amount',
        'from_currency',
        'to_wallet_id',
        'to_amount',
        'to_currency',
        'exchange_rate',
        'exchange_rate_id',
        'status',
        'description',
        'notes',
        'created_by',
        'approved_by',
        'approved_at',
        'completed_at',
    ];

    protected $casts = [
        'from_amount' => 'decimal:2',
        'to_amount' => 'decimal:2',
        'exchange_rate' => 'decimal:8',
        'approved_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * Boot method to generate transfer number
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->transfer_number) {
                $model->transfer_number = 'TRF-' . strtoupper(uniqid());
            }
        });
    }

    /**
     * Get the source wallet
     */
    public function fromWallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'from_wallet_id');
    }

    /**
     * Get the destination wallet
     */
    public function toWallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'to_wallet_id');
    }

    /**
     * Get the exchange rate used
     */
    public function exchangeRateRecord(): BelongsTo
    {
        return $this->belongsTo(ExchangeRate::class, 'exchange_rate_id');
    }

    /**
     * Get the user who created the transfer
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who approved the transfer
     */
    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Approve and execute the transfer
     */
    public function approve(int $approvedBy): bool
    {
        if ($this->status !== 'pending') {
            return false;
        }

        DB::beginTransaction();
        try {
            // Deduct from source wallet
            $fromWallet = $this->fromWallet;
            if ($fromWallet->balance < $this->from_amount) {
                throw new \Exception('Insufficient balance in source wallet');
            }

            $fromWallet->balance -= $this->from_amount;
            $fromWallet->save();

            // Add to destination wallet
            $toWallet = $this->toWallet;
            $toWallet->balance += $this->to_amount;
            $toWallet->save();

            // Create transaction records
            $fromWallet->transactions()->create([
                'type' => 'debit',
                'amount' => $this->from_amount,
                'description' => 'Transfer to ' . $toWallet->name . ' (' . $toWallet->currency . ')',
                'reference' => $this->transfer_number,
                'created_by' => $approvedBy,
            ]);

            $toWallet->transactions()->create([
                'type' => 'credit',
                'amount' => $this->to_amount,
                'description' => 'Transfer from ' . $fromWallet->name . ' (' . $fromWallet->currency . ')',
                'reference' => $this->transfer_number,
                'created_by' => $approvedBy,
            ]);

            // Update transfer status
            $this->update([
                'status' => 'completed',
                'approved_by' => $approvedBy,
                'approved_at' => now(),
                'completed_at' => now(),
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Reject the transfer
     */
    public function reject(int $rejectedBy): bool
    {
        if ($this->status !== 'pending') {
            return false;
        }

        return $this->update([
            'status' => 'rejected',
            'approved_by' => $rejectedBy,
            'approved_at' => now(),
        ]);
    }

    /**
     * Cancel the transfer
     */
    public function cancel(): bool
    {
        if ($this->status !== 'pending') {
            return false;
        }

        return $this->update(['status' => 'cancelled']);
    }

    /**
     * Scope to get pending transfers
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope to get completed transfers
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
