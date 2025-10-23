<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 20 random products using the factory
        \App\Models\Product::factory()->count(20)->create();

        // Keep the original sample products with their specific data
        $sampleProducts = [
            [
                'sku' => 'LAP-001',
                'name' => 'Laptop Pro 15"',
                'description' => 'High-performance laptop with 16GB RAM and 1TB SSD',
                'unit_price' => 1299.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sku' => 'MON-001',
                'name' => '27" 4K Monitor',
                'description' => '27-inch 4K UHD monitor with HDR',
                'unit_price' => 349.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sku' => 'KEY-001',
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB mechanical keyboard with blue switches',
                'unit_price' => 89.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sku' => 'MOU-001',
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse with 6 buttons',
                'unit_price' => 45.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sku' => 'HDD-001',
                'name' => 'External Hard Drive 2TB',
                'description' => 'Portable external hard drive USB 3.0',
                'unit_price' => 79.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Add the sample products
        foreach ($sampleProducts as $product) {
            // Only create if SKU doesn't exist to avoid duplicates
            if (!\App\Models\Product::where('sku', $product['sku'])->exists()) {
                \App\Models\Product::create($product);
            }
        }
    }
}
