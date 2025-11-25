<?php

namespace App\Services;

use App\Models\Earning;
use App\Models\Invoice;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class EarningCalculator
{
    /**
     * Calculate earnings for a sale/invoice.
     * This compares the sale price to the most recent purchase price for each product.
     */
    public function calculateFromSale(Invoice $sale): void
    {
        // Only calculate for confirmed sales
        if ($sale->status !== 'confirmed' && $sale->status !== 'paid') {
            return;
        }

        // Delete existing earnings for this sale to avoid duplicates
        Earning::where('sale_id', $sale->id)->delete();

        // Process each item in the sale
        foreach ($sale->items as $saleItem) {
            $product = $saleItem->product;
            $quantitySold = $saleItem->quantity;
            $salePricePerUnit = $saleItem->unit_price;

            // Find the most recent purchase price for this product
            $mostRecentOrder = OrderItem::where('product_id', $product->id)
                ->whereHas('order', function ($query) {
                    $query->where('status', 'confirmed');
                })
                ->orderBy('created_at', 'desc')
                ->first();

            // If no purchase history, use 0 as cost (or skip)
            $purchasePricePerUnit = $mostRecentOrder ? $mostRecentOrder->price_per_unit : 0;

            // Calculate totals
            $totalCost = $purchasePricePerUnit * $quantitySold;
            $totalRevenue = $salePricePerUnit * $quantitySold;
            $profitAmount = $totalRevenue - $totalCost;
            $profitPercentage = $totalRevenue > 0 ? ($profitAmount / $totalRevenue) * 100 : 0;

            // Create earning record
            Earning::create([
                'sale_id' => $sale->id,
                'product_id' => $product->id,
                'quantity_sold' => $quantitySold,
                'purchase_price_per_unit' => $purchasePricePerUnit,
                'sale_price_per_unit' => $salePricePerUnit,
                'total_cost' => $totalCost,
                'total_revenue' => $totalRevenue,
                'profit_amount' => $profitAmount,
                'profit_percentage' => $profitPercentage,
                'currency' => $sale->currency ?? 'DZD',
                'notes' => $mostRecentOrder
                    ? "Based on Order #{$mostRecentOrder->order->order_number}"
                    : "No purchase history found",
            ]);
        }
    }

    /**
     * Get total earnings for a specific period.
     */
    public function getTotalEarnings(?string $startDate = null, ?string $endDate = null): array
    {
        $query = Earning::query();

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        return [
            'total_revenue' => $query->sum('total_revenue'),
            'total_cost' => $query->sum('total_cost'),
            'total_profit' => $query->sum('profit_amount'),
            'average_profit_margin' => $query->avg('profit_percentage'),
            'transaction_count' => $query->count(),
        ];
    }

    /**
     * Get top earning products.
     */
    public function getTopEarningProducts(int $limit = 10): array
    {
        return DB::table('earnings')
            ->join('products', 'earnings.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.name',
                DB::raw('SUM(earnings.profit_amount) as total_profit'),
                DB::raw('SUM(earnings.total_revenue) as total_revenue'),
                DB::raw('SUM(earnings.quantity_sold) as total_quantity'),
                DB::raw('AVG(earnings.profit_percentage) as avg_profit_margin')
            )
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_profit')
            ->limit($limit)
            ->get()
            ->toArray();
    }
}
