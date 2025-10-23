<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    public function run()
    {
        // Get all product IDs
        $products = Product::all();

        // Create initial stock transactions for each product
        foreach ($products as $product) {
            // Create initial stock (in transaction)
            Transaction::create([
                'product_id' => $product->id,
                'quantity' => rand(50, 500), // Initial stock
                'type' => 'in',
                'note' => 'Initial stock',
                'created_at' => now()->subYear(),
                'updated_at' => now()->subYear(),
            ]);

            // Create some random transactions for each product
            $transactionCount = rand(5, 15); // 5-15 transactions per product
            
            for ($i = 0; $i < $transactionCount; $i++) {
                $type = rand(0, 1) ? 'in' : 'out';
                $quantity = $type === 'in' 
                    ? rand(10, 100) 
                    : rand(1, 50); // Smaller quantities for out transactions
                
                $notes = [
                    'in' => [
                        'Restocked inventory',
                        'Supplier delivery',
                        'Warehouse transfer in',
                        'Return from customer',
                        'Quality control pass',
                        'Initial stock addition',
                        'Bulk purchase',
                        'Vendor return'
                    ],
                    'out' => [
                        'Customer order',
                        'Damaged goods',
                        'Inventory adjustment',
                        'Warehouse transfer out',
                        'Quality control reject',
                        'Donation',
                        'Promotional giveaway',
                        'Sample distribution'
                    ]
                ];

                $daysAgo = rand(0, 364); // Within the past year
                $createdAt = now()->subDays($daysAgo);
                
                Transaction::create([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'type' => $type,
                    'note' => $this->faker->randomElement($notes[$type]),
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);
            }
        }
    }
}
