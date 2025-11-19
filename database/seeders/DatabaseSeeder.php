<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Super Admin user
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@psm.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'email_verified_at' => now(),
        ]);

        // Create Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin.user@psm.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create Stock Agent user
        User::create([
            'name' => 'Stock Agent',
            'email' => 'stock@psm.com',
            'password' => Hash::make('password'),
            'role' => 'stock_agent',
            'email_verified_at' => now(),
        ]);
    }
}
