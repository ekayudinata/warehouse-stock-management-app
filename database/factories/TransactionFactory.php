<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['in', 'out']);
        $quantity = $this->faker->numberBetween(1, 100);
        
        // For 'out' transactions, ensure we don't exceed available quantity
        if ($type === 'out') {
            $quantity = $this->faker->numberBetween(1, 50); // Smaller range for out transactions
        }

        $notes = [
            'Restocked inventory',
            'Customer order',
            'Initial stock',
            'Return from customer',
            'Damaged goods',
            'Inventory adjustment',
            'Supplier delivery',
            'Warehouse transfer',
            'Quality control pass',
            'Promotional stock'
        ];

        return [
            'product_id' => Product::factory(),
            'quantity' => $quantity,
            'type' => $type,
            'note' => $this->faker->randomElement($notes),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
