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
        // Check if invoices table exists
        if (!Schema::hasTable('invoices')) {
            return; // Skip if table doesn't exist
        }

        // Update existing 'draft' status to 'pending'
        DB::table('invoices')
            ->where('status', 'draft')
            ->update(['status' => 'pending']);

        // For PostgreSQL, we need to handle this differently
        if (DB::getDriverName() === 'pgsql') {
            // Drop the default constraint first
            DB::statement("ALTER TABLE invoices ALTER COLUMN status DROP DEFAULT");

            // Since we're using string column, just set the new default
            DB::statement("ALTER TABLE invoices ALTER COLUMN status SET DEFAULT 'pending'");

            // Add a check constraint to validate the values
            try {
                DB::statement("ALTER TABLE invoices DROP CONSTRAINT IF EXISTS invoices_status_check");
            } catch (\Exception $e) {
                // Constraint might not exist, that's okay
            }

            DB::statement("ALTER TABLE invoices ADD CONSTRAINT invoices_status_check CHECK (status IN ('pending', 'confirmed', 'paid', 'cancelled'))");
        } else {
            // For MySQL
            DB::statement("ALTER TABLE invoices MODIFY COLUMN status ENUM('pending', 'confirmed', 'paid', 'cancelled') NOT NULL DEFAULT 'pending'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if invoices table exists
        if (!Schema::hasTable('invoices')) {
            return; // Skip if table doesn't exist
        }

        // Update 'pending' back to 'draft'
        DB::table('invoices')
            ->where('status', 'pending')
            ->update(['status' => 'draft']);

        // For PostgreSQL
        if (DB::getDriverName() === 'pgsql') {
            DB::statement("ALTER TABLE invoices ALTER COLUMN status DROP DEFAULT");
            DB::statement("ALTER TABLE invoices ALTER COLUMN status SET DEFAULT 'draft'");

            try {
                DB::statement("ALTER TABLE invoices DROP CONSTRAINT IF EXISTS invoices_status_check");
            } catch (\Exception $e) {
                // Constraint might not exist, that's okay
            }

            DB::statement("ALTER TABLE invoices ADD CONSTRAINT invoices_status_check CHECK (status IN ('draft', 'confirmed', 'paid', 'cancelled'))");
        } else {
            // For MySQL
            DB::statement("ALTER TABLE invoices MODIFY COLUMN status ENUM('draft', 'confirmed', 'paid', 'cancelled') NOT NULL DEFAULT 'draft'");
        }
    }
};