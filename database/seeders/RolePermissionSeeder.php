<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // User management
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Role management
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',

            // Permission management
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',

            // Category management
            'view categories',
            'create categories',
            'edit categories',
            'delete categories',

            // Product management
            'view products',
            'create products',
            'edit products',
            'delete products',

            // Client management
            'view clients',
            'create clients',
            'edit clients',
            'delete clients',

            // Supplier management
            'view suppliers',
            'create suppliers',
            'edit suppliers',
            'delete suppliers',

            // Wallet management
            'view wallets',
            'create wallets',
            'edit wallets',
            'delete wallets',
            'manage transactions',

            // Order management
            'view orders',
            'create orders',
            'edit orders',
            'delete orders',
            'confirm orders',

            // Stock Hub management
            'view stock_hubs',
            'create stock_hubs',
            'edit stock_hubs',
            'delete stock_hubs',

            // Stock management
            'view stock',
            'update stock',
            'create stock',
            'delete stock',

            // Transit Receipt management
            'view transit_receipts',
            'create transit_receipts',
            'edit transit_receipts',
            'delete transit_receipts',

            // Loss management
            'view losses',
            'create losses',
            'edit losses',
            'delete losses',

            // Invoice management
            'view invoices',
            'create invoices',
            'edit invoices',
            'delete invoices',
            'print invoices',
            'confirm invoices',

            // Reports
            'view reports',
            'export reports',

            // Settings
            'view settings',
            'edit settings',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions

        // Super Admin - has all permissions
        $superAdmin = Role::create(['name' => 'super_admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Admin - has most permissions except user/role/permission management
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([
            'view categories', 'create categories', 'edit categories', 'delete categories',
            'view products', 'create products', 'edit products', 'delete products',
            'view clients', 'create clients', 'edit clients', 'delete clients',
            'view suppliers', 'create suppliers', 'edit suppliers', 'delete suppliers',
            'view wallets', 'create wallets', 'edit wallets', 'delete wallets', 'manage transactions',
            'view orders', 'create orders', 'edit orders', 'delete orders', 'confirm orders',
            'view stock_hubs', 'create stock_hubs', 'edit stock_hubs', 'delete stock_hubs',
            'view stock', 'update stock', 'create stock', 'delete stock',
            'view transit_receipts', 'create transit_receipts', 'edit transit_receipts', 'delete transit_receipts',
            'view losses', 'create losses', 'edit losses', 'delete losses',
            'view invoices', 'create invoices', 'edit invoices', 'print invoices', 'confirm invoices',
            'view reports', 'export reports',
            'view settings',
        ]);

        // Stock Agent - can manage inventory, receive transits, create invoices
        $stockAgent = Role::create(['name' => 'stock_agent']);
        $stockAgent->givePermissionTo([
            'view categories',
            'view products',
            'view clients',
            'view stock_hubs',
            'view stock', 'update stock', 'create stock',
            'view orders',
            'view transit_receipts', 'create transit_receipts',
            'view losses', 'create losses',
            'view invoices', 'create invoices', 'print invoices', 'confirm invoices',
        ]);

        // View Only - can only view data
        $viewOnly = Role::create(['name' => 'view_only']);
        $viewOnly->givePermissionTo([
            'view users',
            'view categories',
            'view products',
            'view clients',
            'view suppliers',
            'view wallets',
            'view orders',
            'view stock_hubs',
            'view stock',
            'view transit_receipts',
            'view losses',
            'view invoices',
            'view reports',
        ]);

        $this->command->info('Roles and permissions created successfully!');
    }
}
