<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Database\Seeder;

class InventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all product IDs
        $productIds = Product::pluck('id');

        // Create inventory for each product
        foreach ($productIds as $productId) {
            Inventory::create([
                'product_id' => $productId,
                'quantity' => rand(0, 1000), // Random quantity between 0 and 1000
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // You can also use the factory if you want more random data
        // Inventory::factory()->count(50)->create();
    }
}
