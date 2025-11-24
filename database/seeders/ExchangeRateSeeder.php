<?php

namespace Database\Seeders;

use App\Models\ExchangeRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExchangeRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding exchange rates...');

        // Common exchange rates (approximate, as of Nov 2025)
        $rates = [
            // USD conversions
            ['from' => 'USD', 'to' => 'DZD', 'rate' => 135.50, 'notes' => 'US Dollar to Algerian Dinar'],
            ['from' => 'USD', 'to' => 'EUR', 'rate' => 0.92, 'notes' => 'US Dollar to Euro'],
            ['from' => 'USD', 'to' => 'CNY', 'rate' => 7.25, 'notes' => 'US Dollar to Chinese Yuan'],
            ['from' => 'USD', 'to' => 'AED', 'rate' => 3.67, 'notes' => 'US Dollar to UAE Dirham'],
            ['from' => 'USD', 'to' => 'TRY', 'rate' => 32.50, 'notes' => 'US Dollar to Turkish Lira'],
            ['from' => 'USD', 'to' => 'GBP', 'rate' => 0.79, 'notes' => 'US Dollar to British Pound'],

            // EUR conversions
            ['from' => 'EUR', 'to' => 'USD', 'rate' => 1.09, 'notes' => 'Euro to US Dollar'],
            ['from' => 'EUR', 'to' => 'DZD', 'rate' => 147.50, 'notes' => 'Euro to Algerian Dinar'],
            ['from' => 'EUR', 'to' => 'CNY', 'rate' => 7.90, 'notes' => 'Euro to Chinese Yuan'],
            ['from' => 'EUR', 'to' => 'AED', 'rate' => 4.00, 'notes' => 'Euro to UAE Dirham'],
            ['from' => 'EUR', 'to' => 'TRY', 'rate' => 35.40, 'notes' => 'Euro to Turkish Lira'],
            ['from' => 'EUR', 'to' => 'GBP', 'rate' => 0.86, 'notes' => 'Euro to British Pound'],

            // DZD conversions
            ['from' => 'DZD', 'to' => 'USD', 'rate' => 0.00738, 'notes' => 'Algerian Dinar to US Dollar'],
            ['from' => 'DZD', 'to' => 'EUR', 'rate' => 0.00678, 'notes' => 'Algerian Dinar to Euro'],
            ['from' => 'DZD', 'to' => 'CNY', 'rate' => 0.0535, 'notes' => 'Algerian Dinar to Chinese Yuan'],
            ['from' => 'DZD', 'to' => 'AED', 'rate' => 0.0271, 'notes' => 'Algerian Dinar to UAE Dirham'],
            ['from' => 'DZD', 'to' => 'TRY', 'rate' => 0.240, 'notes' => 'Algerian Dinar to Turkish Lira'],

            // CNY conversions
            ['from' => 'CNY', 'to' => 'USD', 'rate' => 0.138, 'notes' => 'Chinese Yuan to US Dollar'],
            ['from' => 'CNY', 'to' => 'EUR', 'rate' => 0.127, 'notes' => 'Chinese Yuan to Euro'],
            ['from' => 'CNY', 'to' => 'DZD', 'rate' => 18.70, 'notes' => 'Chinese Yuan to Algerian Dinar'],
            ['from' => 'CNY', 'to' => 'AED', 'rate' => 0.506, 'notes' => 'Chinese Yuan to UAE Dirham'],
            ['from' => 'CNY', 'to' => 'TRY', 'rate' => 4.48, 'notes' => 'Chinese Yuan to Turkish Lira'],

            // AED conversions
            ['from' => 'AED', 'to' => 'USD', 'rate' => 0.272, 'notes' => 'UAE Dirham to US Dollar'],
            ['from' => 'AED', 'to' => 'EUR', 'rate' => 0.250, 'notes' => 'UAE Dirham to Euro'],
            ['from' => 'AED', 'to' => 'DZD', 'rate' => 36.90, 'notes' => 'UAE Dirham to Algerian Dinar'],
            ['from' => 'AED', 'to' => 'CNY', 'rate' => 1.975, 'notes' => 'UAE Dirham to Chinese Yuan'],
            ['from' => 'AED', 'to' => 'TRY', 'rate' => 8.86, 'notes' => 'UAE Dirham to Turkish Lira'],

            // TRY conversions
            ['from' => 'TRY', 'to' => 'USD', 'rate' => 0.0308, 'notes' => 'Turkish Lira to US Dollar'],
            ['from' => 'TRY', 'to' => 'EUR', 'rate' => 0.0282, 'notes' => 'Turkish Lira to Euro'],
            ['from' => 'TRY', 'to' => 'DZD', 'rate' => 4.17, 'notes' => 'Turkish Lira to Algerian Dinar'],
            ['from' => 'TRY', 'to' => 'CNY', 'rate' => 0.223, 'notes' => 'Turkish Lira to Chinese Yuan'],
            ['from' => 'TRY', 'to' => 'AED', 'rate' => 0.113, 'notes' => 'Turkish Lira to UAE Dirham'],

            // GBP conversions
            ['from' => 'GBP', 'to' => 'USD', 'rate' => 1.27, 'notes' => 'British Pound to US Dollar'],
            ['from' => 'GBP', 'to' => 'EUR', 'rate' => 1.17, 'notes' => 'British Pound to Euro'],
            ['from' => 'GBP', 'to' => 'DZD', 'rate' => 172.00, 'notes' => 'British Pound to Algerian Dinar'],
            ['from' => 'GBP', 'to' => 'CNY', 'rate' => 9.21, 'notes' => 'British Pound to Chinese Yuan'],
            ['from' => 'GBP', 'to' => 'AED', 'rate' => 4.66, 'notes' => 'British Pound to UAE Dirham'],
        ];

        $created = 0;
        foreach ($rates as $rateData) {
            ExchangeRate::create([
                'from_currency' => $rateData['from'],
                'to_currency' => $rateData['to'],
                'rate' => $rateData['rate'],
                'is_active' => true,
                'notes' => $rateData['notes'],
                'effective_date' => now(),
            ]);
            $created++;
        }

        $this->command->info("✅ Created {$created} exchange rates!");
        $this->command->info('');
        $this->command->info('Sample rates:');
        $this->command->info('  USD → DZD: 135.50');
        $this->command->info('  EUR → DZD: 147.50');
        $this->command->info('  CNY → DZD: 18.70');
        $this->command->info('  AED → DZD: 36.90');
    }
}
