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
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained('invoices')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');

            $table->integer('quantity_sold');
            $table->decimal('purchase_price_per_unit', 15, 2);
            $table->decimal('sale_price_per_unit', 15, 2);

            $table->decimal('total_cost', 15, 2);
            $table->decimal('total_revenue', 15, 2);
            $table->decimal('profit_amount', 15, 2);
            $table->decimal('profit_percentage', 8, 2);

            $table->string('currency', 3)->default('DZD');
            $table->text('notes')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('sale_id');
            $table->index('product_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('earnings');
    }
};
