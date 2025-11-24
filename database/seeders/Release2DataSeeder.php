<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Client;
use App\Models\Supplier;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Release2DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Categories
        $categories = [
            ['name' => 'Electronics', 'description' => 'Electronic devices and components', 'is_active' => true],
            ['name' => 'Clothing', 'description' => 'Apparel and fashion items', 'is_active' => true],
            ['name' => 'Home & Garden', 'description' => 'Home improvement and garden supplies', 'is_active' => true],
            ['name' => 'Toys & Games', 'description' => 'Toys, games, and entertainment', 'is_active' => true],
            ['name' => 'Automotive', 'description' => 'Auto parts and accessories', 'is_active' => true],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        $this->command->info('Categories created!');

        // Create Products
        $products = [
            [
                'name' => 'Wireless Bluetooth Headphones',
                'sku' => 'ELEC-WH-001',
                'description' => 'High-quality wireless headphones with noise cancellation',
                'country_origin' => 'China',
                'price_per_unit' => 4500.00,
                'category_id' => 1,
                'stock_quantity' => 150,
                'low_stock_threshold' => 20,
                'is_active' => true,
            ],
            [
                'name' => 'Smart Watch Series 5',
                'sku' => 'ELEC-SW-002',
                'description' => 'Fitness tracking smartwatch with heart rate monitor',
                'country_origin' => 'China',
                'price_per_unit' => 8900.00,
                'category_id' => 1,
                'stock_quantity' => 85,
                'low_stock_threshold' => 15,
                'is_active' => true,
            ],
            [
                'name' => 'Men\'s Cotton T-Shirt',
                'sku' => 'CLO-TS-003',
                'description' => '100% cotton comfortable t-shirt',
                'country_origin' => 'Turkey',
                'price_per_unit' => 1200.00,
                'category_id' => 2,
                'stock_quantity' => 300,
                'low_stock_threshold' => 50,
                'is_active' => true,
            ],
            [
                'name' => 'Women\'s Leather Handbag',
                'sku' => 'CLO-HB-004',
                'description' => 'Premium leather handbag with multiple compartments',
                'country_origin' => 'Turkey',
                'price_per_unit' => 5500.00,
                'category_id' => 2,
                'stock_quantity' => 45,
                'low_stock_threshold' => 10,
                'is_active' => true,
            ],
            [
                'name' => 'LED Desk Lamp',
                'sku' => 'HOME-LD-005',
                'description' => 'Adjustable LED desk lamp with USB charging',
                'country_origin' => 'China',
                'price_per_unit' => 2800.00,
                'category_id' => 3,
                'stock_quantity' => 8,
                'low_stock_threshold' => 10,
                'is_active' => true,
            ],
            [
                'name' => 'Robot Building Kit',
                'sku' => 'TOY-RB-006',
                'description' => 'Educational robot building kit for kids',
                'country_origin' => 'China',
                'price_per_unit' => 6200.00,
                'category_id' => 4,
                'stock_quantity' => 120,
                'low_stock_threshold' => 25,
                'is_active' => true,
            ],
            [
                'name' => 'Car Phone Holder',
                'sku' => 'AUTO-PH-007',
                'description' => 'Universal magnetic car phone mount',
                'country_origin' => 'UAE',
                'price_per_unit' => 800.00,
                'category_id' => 5,
                'stock_quantity' => 250,
                'low_stock_threshold' => 40,
                'is_active' => true,
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }

        $this->command->info('Products created!');

        // Create Clients
        $clients = [
            [
                'name' => 'Ahmed Electronics Store',
                'phone' => '+213 555 123 456',
                'email' => 'ahmed@electronics.dz',
                'address' => '15 Rue Didouche Mourad',
                'city' => 'Algiers',
                'country' => 'Algeria',
                'notes' => 'Regular customer, prefers bulk orders',
                'is_active' => true,
            ],
            [
                'name' => 'Fashion Boutique Oran',
                'phone' => '+213 555 234 567',
                'email' => 'contact@fashionboutique.dz',
                'address' => '42 Avenue de l\'ANP',
                'city' => 'Oran',
                'country' => 'Algeria',
                'notes' => 'Fashion items only',
                'is_active' => true,
            ],
            [
                'name' => 'Home Decor Constantine',
                'phone' => '+213 555 345 678',
                'email' => 'info@homedecor.dz',
                'address' => '28 Rue Larbi Ben M\'hidi',
                'city' => 'Constantine',
                'country' => 'Algeria',
                'notes' => 'Interested in home & garden products',
                'is_active' => true,
            ],
            [
                'name' => 'Kids Paradise Annaba',
                'phone' => '+213 555 456 789',
                'email' => 'sales@kidsparadise.dz',
                'address' => '10 Boulevard du 1er Novembre',
                'city' => 'Annaba',
                'country' => 'Algeria',
                'notes' => 'Toys and games specialist',
                'is_active' => true,
            ],
            [
                'name' => 'Auto Parts Setif',
                'phone' => '+213 555 567 890',
                'email' => 'contact@autoparts.dz',
                'address' => '33 Rue Mohamed Boudiaf',
                'city' => 'Setif',
                'country' => 'Algeria',
                'notes' => 'Automotive parts retailer',
                'is_active' => true,
            ],
        ];

        foreach ($clients as $clientData) {
            Client::create($clientData);
        }

        $this->command->info('Clients created!');

        // Create Suppliers
        $suppliers = [
            [
                'name' => 'Shenzhen Electronics Ltd',
                'contact_person' => 'Li Wei',
                'phone' => '+86 138 0000 1234',
                'email' => 'liwei@shenzhen-elec.cn',
                'address' => 'Huaqiang North Road, Futian District',
                'city' => 'Shenzhen',
                'country' => 'China',
                'payment_terms' => '30% advance, 70% on delivery',
                'notes' => 'Electronics supplier, good quality',
                'is_active' => true,
            ],
            [
                'name' => 'Istanbul Textile Co',
                'contact_person' => 'Mehmet Yilmaz',
                'phone' => '+90 212 555 6789',
                'email' => 'mehmet@istanbul-textile.tr',
                'address' => 'Merter Tekstil Kenti',
                'city' => 'Istanbul',
                'country' => 'Turkey',
                'payment_terms' => '50% advance, 50% before shipping',
                'notes' => 'Clothing and textile manufacturer',
                'is_active' => true,
            ],
            [
                'name' => 'Dubai Trading House',
                'contact_person' => 'Ahmed Al-Mansoori',
                'phone' => '+971 50 123 4567',
                'email' => 'ahmed@dubaitrade.ae',
                'address' => 'Deira, Dubai',
                'city' => 'Dubai',
                'country' => 'UAE',
                'payment_terms' => '100% on delivery',
                'notes' => 'General merchandise supplier',
                'is_active' => true,
            ],
        ];

        foreach ($suppliers as $supplierData) {
            Supplier::create($supplierData);
        }

        $this->command->info('Suppliers created!');

        // Create Wallets
        $wallets = [
            [
                'user_id' => 1, // Super Admin
                'name' => 'Main Business Wallet (DZD)',
                'currency' => 'DZD',
                'balance' => 5000000.00,
                'description' => 'Primary wallet for Algerian Dinar transactions',
                'is_active' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'USD Wallet',
                'currency' => 'USD',
                'balance' => 25000.00,
                'description' => 'Wallet for international transactions in US Dollars',
                'is_active' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'CNY Wallet (China Suppliers)',
                'currency' => 'CNY',
                'balance' => 150000.00,
                'description' => 'Dedicated wallet for Chinese supplier payments',
                'is_active' => true,
            ],
            [
                'user_id' => 2, // Admin
                'name' => 'EUR Wallet',
                'currency' => 'EUR',
                'balance' => 10000.00,
                'description' => 'Wallet for European transactions',
                'is_active' => true,
            ],
        ];

        foreach ($wallets as $walletData) {
            $wallet = Wallet::create($walletData);

            // Add sample transactions for each wallet
            if ($wallet->balance > 0) {
                $wallet->transactions()->create([
                    'type' => 'credit',
                    'amount' => $wallet->balance,
                    'description' => 'Initial balance',
                    'reference' => 'INIT-' . $wallet->id,
                    'created_by' => $wallet->user_id,
                ]);
            }
        }

        $this->command->info('Wallets and transactions created!');
        $this->command->info('Release 2 sample data seeded successfully!');
    }
}
