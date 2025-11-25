<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update existing 'draft' status to 'pending'
        DB::table('invoices')
            ->where('status', 'draft')
            ->update(['status' => 'pending']);

        // Modify the enum column to replace 'draft' with 'pending'
        DB::statement("ALTER TABLE invoices MODIFY COLUMN status ENUM('pending', 'confirmed', 'paid', 'cancelled') NOT NULL DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Update 'pending' back to 'draft'
        DB::table('invoices')
            ->where('status', 'pending')
            ->update(['status' => 'draft']);

        // Restore original enum
        DB::statement("ALTER TABLE invoices MODIFY COLUMN status ENUM('draft', 'confirmed', 'paid', 'cancelled') NOT NULL DEFAULT 'draft'");
    }
};
