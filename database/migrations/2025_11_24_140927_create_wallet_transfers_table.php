<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wallet_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('transfer_number')->unique();

            // From wallet
            $table->foreignId('from_wallet_id')->constrained('wallets')->onDelete('cascade');
            $table->decimal('from_amount', 20, 2); // Amount deducted from source wallet
            $table->string('from_currency', 3);

            // To wallet
            $table->foreignId('to_wallet_id')->constrained('wallets')->onDelete('cascade');
            $table->decimal('to_amount', 20, 2); // Amount credited to destination wallet
            $table->string('to_currency', 3);

            // Exchange rate info (if currencies differ)
            $table->decimal('exchange_rate', 20, 8)->nullable();
            $table->foreignId('exchange_rate_id')->nullable()->constrained('exchange_rates')->nullOnDelete();

            // Transfer details
            $table->enum('status', ['pending', 'approved', 'completed', 'rejected', 'cancelled'])->default('pending');
            $table->text('description')->nullable();
            $table->text('notes')->nullable();

            // User tracking
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('from_wallet_id');
            $table->index('to_wallet_id');
            $table->index('status');
            $table->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_transfers');
    }
};
