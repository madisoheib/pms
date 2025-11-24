<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Loss;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Stock;
use App\Models\StockHub;
use App\Models\Supplier;
use App\Models\TransitReceipt;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Release3DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding Release 3 data...');

        DB::transaction(function () {
            // Get existing data
            $user = User::first();
            $products = Product::limit(5)->get();
            $suppliers = Supplier::limit(3)->get();
            $clients = Client::limit(2)->get();
            $wallet = Wallet::where('is_active', true)->first();

            if (!$user || $products->isEmpty() || $suppliers->isEmpty() || !$wallet) {
                $this->command->error('Please run Release 1 & 2 seeders first!');
                return;
            }

            // 1. Create Stock Hubs
            $this->command->info('Creating stock hubs...');
            $hubs = [
                [
                    'name' => 'Main Warehouse Algiers',
                    'location' => 'Algiers',
                    'address' => 'Zone Industrielle, Rouiba, Algiers 16012',
                    'is_active' => true,
                ],
                [
                    'name' => 'Oran Distribution Center',
                    'location' => 'Oran',
                    'address' => 'Port d\'Oran, Es Sénia, Oran 31000',
                    'is_active' => true,
                ],
                [
                    'name' => 'Constantine Storage Facility',
                    'location' => 'Constantine',
                    'address' => 'Route Nationale 79, Constantine 25000',
                    'is_active' => true,
                ],
                [
                    'name' => 'Annaba Port Warehouse',
                    'location' => 'Annaba',
                    'address' => 'Port d\'Annaba, Annaba 23000',
                    'is_active' => true,
                ],
                [
                    'name' => 'Sétif Regional Hub',
                    'location' => 'Sétif',
                    'address' => 'Zone Industrielle Ain Abessa, Sétif 19000',
                    'is_active' => false, // One inactive hub
                ],
            ];

            $createdHubs = [];
            foreach ($hubs as $hubData) {
                $createdHubs[] = StockHub::create($hubData);
            }
            $this->command->info('✓ Created ' . count($createdHubs) . ' stock hubs');

            // 2. Create Stock Records
            $this->command->info('Creating stock records...');
            $stockCount = 0;
            foreach ($products as $product) {
                // Add stock to 2-3 active hubs for each product
                $activeHubs = array_filter($createdHubs, fn($h) => $h->is_active);
                $hubsForProduct = array_slice($activeHubs, 0, rand(2, 3));

                foreach ($hubsForProduct as $hub) {
                    Stock::create([
                        'product_id' => $product->id,
                        'stock_hub_id' => $hub->id,
                        'quantity' => rand(50, 500),
                    ]);
                    $stockCount++;
                }
            }
            $this->command->info('✓ Created ' . $stockCount . ' stock records');

            // 3. Create Orders with Different Statuses
            $this->command->info('Creating sample orders...');
            $mainHub = $createdHubs[0]; // Main Warehouse Algiers

            // Order 1: Pending order (just created) - with multiple products
            $order1 = Order::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'total_price' => 200000.00,
                'country_origin' => 'China',
                'supplier_id' => $suppliers[0]->id,
                'client_id' => null, // Stock inventory
                'wallet_id' => $wallet->id,
                'stock_hub_id' => $mainHub->id,
                'delivery_date_expected' => now()->addDays(30),
                'status' => 'pending',
                'notes' => 'First large shipment from new supplier',
                'created_by' => $user->id,
            ]);

            // Add items to order 1
            OrderItem::create([
                'order_id' => $order1->id,
                'product_id' => $products[0]->id,
                'quantity' => 1000,
                'price_per_unit' => 150.00,
                'subtotal' => 150000.00,
            ]);
            OrderItem::create([
                'order_id' => $order1->id,
                'product_id' => $products[1]->id,
                'quantity' => 200,
                'price_per_unit' => 250.00,
                'subtotal' => 50000.00,
            ]);

            // Order 2: In transit
            $order2 = Order::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'total_price' => 125000.00,
                'country_origin' => 'Turkey',
                'supplier_id' => $suppliers[1]->id,
                'client_id' => null,
                'wallet_id' => $wallet->id,
                'stock_hub_id' => $createdHubs[1]->id, // Oran
                'delivery_date_expected' => now()->addDays(7),
                'status' => 'in_transit',
                'notes' => 'Currently at customs',
                'created_by' => $user->id,
            ]);

            OrderItem::create([
                'order_id' => $order2->id,
                'product_id' => $products[1]->id,
                'quantity' => 500,
                'price_per_unit' => 250.00,
                'subtotal' => 125000.00,
            ]);

            // Order 3: Pre-sold order (has client) - in transit
            $order3 = Order::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'total_price' => 54000.00,
                'country_origin' => 'France',
                'supplier_id' => $suppliers[0]->id,
                'client_id' => $clients[0]->id, // Pre-sold
                'wallet_id' => $wallet->id,
                'stock_hub_id' => $mainHub->id,
                'delivery_date_expected' => now()->addDays(5),
                'status' => 'in_transit',
                'notes' => 'Pre-sold to ' . $clients[0]->name,
                'created_by' => $user->id,
            ]);

            OrderItem::create([
                'order_id' => $order3->id,
                'product_id' => $products[2]->id,
                'quantity' => 300,
                'price_per_unit' => 180.00,
                'subtotal' => 54000.00,
            ]);

            // Order 4: Received with perfect delivery
            $order4 = Order::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'total_price' => 64000.00,
                'country_origin' => 'Germany',
                'supplier_id' => $suppliers[2]->id,
                'client_id' => null,
                'wallet_id' => $wallet->id,
                'stock_hub_id' => $createdHubs[2]->id, // Constantine
                'delivery_date_expected' => now()->subDays(2),
                'status' => 'received',
                'notes' => 'High quality shipment',
                'created_by' => $user->id,
            ]);

            OrderItem::create([
                'order_id' => $order4->id,
                'product_id' => $products[3]->id,
                'quantity' => 200,
                'price_per_unit' => 320.00,
                'subtotal' => 64000.00,
            ]);

            // Order 5: Received with discrepancies (missing items)
            $order5 = Order::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'total_price' => 38000.00,
                'country_origin' => 'Italy',
                'supplier_id' => $suppliers[1]->id,
                'client_id' => $clients[1]->id,
                'wallet_id' => $wallet->id,
                'stock_hub_id' => $mainHub->id,
                'delivery_date_expected' => now()->subDays(5),
                'status' => 'received',
                'notes' => 'Some items missing during transit',
                'created_by' => $user->id,
            ]);

            $order5Item = OrderItem::create([
                'order_id' => $order5->id,
                'product_id' => $products[4]->id,
                'quantity' => 400,
                'price_per_unit' => 95.00,
                'subtotal' => 38000.00,
            ]);

            // Order 6: Overdue order (still in transit)
            $order6 = Order::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'total_price' => 105000.00,
                'country_origin' => 'Spain',
                'supplier_id' => $suppliers[0]->id,
                'client_id' => null,
                'wallet_id' => $wallet->id,
                'stock_hub_id' => $createdHubs[3]->id, // Annaba
                'delivery_date_expected' => now()->subDays(10), // Overdue!
                'status' => 'in_transit',
                'notes' => 'Delayed at port - follow up needed',
                'created_by' => $user->id,
            ]);

            OrderItem::create([
                'order_id' => $order6->id,
                'product_id' => $products[0]->id,
                'quantity' => 750,
                'price_per_unit' => 140.00,
                'subtotal' => 105000.00,
            ]);

            $this->command->info('✓ Created 6 sample orders');

            // 4. Create Transit Receipts
            $this->command->info('Creating transit receipts...');

            // Receipt for Order 4 - Perfect delivery (no discrepancy)
            $receipt4 = TransitReceipt::create([
                'order_id' => $order4->id,
                'quantity_received' => 200, // Exactly as expected
                'quantity_discrepancy' => 0,
                'notes' => 'All items received in perfect condition',
                'received_by' => $user->id,
                'received_at' => now()->subDays(2),
            ]);

            // Receipt for Order 5 - Missing items
            $receipt5 = TransitReceipt::create([
                'order_id' => $order5->id,
                'quantity_received' => 375, // 25 items missing
                'quantity_discrepancy' => 25,
                'notes' => 'Box #7 was damaged and some items were missing. Insurance claim filed.',
                'received_by' => $user->id,
                'received_at' => now()->subDays(5),
            ]);

            $this->command->info('✓ Created 2 transit receipts');

            // 5. Create Loss Record for Order 5
            $this->command->info('Creating loss records...');
            $loss = Loss::create([
                'order_id' => $order5->id,
                'product_id' => $order5Item->product_id,
                'quantity_missing' => 25,
                'loss_amount' => 25 * 95.00, // 2,375 DZD
                'reason' => 'Damaged box during transit - insurance claim #INS-2025-0045',
            ]);

            $this->command->info('✓ Created loss record (2,375 DZD)');

            // 6. Update stock levels for received orders
            $this->command->info('Updating stock levels for received orders...');

            // Order 4 stock update (Constantine hub)
            $stock4 = Stock::firstOrCreate(
                [
                    'product_id' => $order4->items->first()->product_id,
                    'stock_hub_id' => $order4->stock_hub_id,
                ],
                ['quantity' => 0]
            );
            $stock4->addStock(200);

            // Order 5 stock update (Main Algiers hub) - only 375 received
            $stock5 = Stock::firstOrCreate(
                [
                    'product_id' => $order5Item->product_id,
                    'stock_hub_id' => $order5->stock_hub_id,
                ],
                ['quantity' => 0]
            );
            $stock5->addStock(375);

            $this->command->info('✓ Updated stock levels for received orders');
        });

        $this->command->info('');
        $this->command->info('✅ Release 3 data seeded successfully!');
        $this->command->info('');
        $this->command->info('Summary:');
        $this->command->info('- 5 Stock Hubs created (4 active, 1 inactive)');
        $this->command->info('- Stock records distributed across hubs');
        $this->command->info('- 6 Orders: 1 pending, 3 in transit (1 overdue), 2 received');
        $this->command->info('- 2 Transit receipts (1 perfect, 1 with discrepancies)');
        $this->command->info('- 1 Loss record (2,375 DZD)');
    }
}
