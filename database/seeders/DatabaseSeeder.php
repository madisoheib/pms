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
        // First, create roles and permissions
        $this->call(RolePermissionSeeder::class);

        // Create Super Admin user
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@psm.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'email_verified_at' => now(),
        ]);
        $superAdmin->assignRole('super_admin');

        // Create Admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin.user@psm.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('admin');

        // Create Stock Agent user
        $stockAgent = User::create([
            'name' => 'Stock Agent',
            'email' => 'stock@psm.com',
            'password' => Hash::make('password'),
            'role' => 'stock_agent',
            'email_verified_at' => now(),
        ]);
        $stockAgent->assignRole('stock_agent');

        // Create View Only user
        $viewOnly = User::create([
            'name' => 'View Only User',
            'email' => 'viewer@psm.com',
            'password' => Hash::make('password'),
            'role' => 'view_only',
            'email_verified_at' => now(),
        ]);
        $viewOnly->assignRole('view_only');

        $this->command->info('Users created and roles assigned successfully!');

        // Seed Release 2 sample data
        $this->call(Release2DataSeeder::class);

        // Seed Release 3 sample data
        $this->call(Release3DataSeeder::class);
    }
}
