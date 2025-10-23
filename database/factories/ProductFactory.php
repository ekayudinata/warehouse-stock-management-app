<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = [
            'Electronics' => ['Laptop', 'Smartphone', 'Tablet', 'Monitor', 'Printer'],
            'Accessories' => ['Keyboard', 'Mouse', 'Headphones', 'Webcam', 'Microphone'],
            'Storage' => ['SSD', 'HDD', 'USB Drive', 'Memory Card', 'External SSD'],
            'Networking' => ['Router', 'Switch', 'Access Point', 'Network Cable', 'Modem']
        ];
        
        $category = $this->faker->randomElement(array_keys($categories));
        $productType = $this->faker->randomElement($categories[$category]);
        $brands = ['Dell', 'HP', 'Lenovo', 'Samsung', 'LG', 'ASUS', 'Acer', 'Logitech', 'Corsair', 'Seagate'];
        $brand = $this->faker->randomElement($brands);
        
        $name = $brand . ' ' . $productType . ' ' . $this->faker->unique()->numberBetween(100, 9999);
        
        return [
            'sku' => strtoupper(substr($category, 0, 3)) . '-' . $this->faker->unique()->numberBetween(1000, 9999),
            'name' => $name,
            'description' => $this->faker->sentence(15),
            'unit_price' => $this->faker->randomFloat(2, 10, 2000),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
