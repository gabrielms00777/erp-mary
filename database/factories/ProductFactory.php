<?php

namespace Database\Factories;

use App\Models\ProductType;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'product_type_id' => ProductType::factory(),
            'supplier_id' => Supplier::factory(),
            'barcode' => $this->faker->ean13,
            'unit_id' => Unit::factory(),
            'net_weight' => $this->faker->randomFloat(2, 0.1, 100),
            'gross_weight' => $this->faker->randomFloat(2, 0.1, 100),
            'cost_price' => $this->faker->randomFloat(2, 1, 100),
            'sale_price' => $this->faker->randomFloat(2, 1, 150),
            'min_stock' => $this->faker->numberBetween(0, 10),
            'max_stock' => $this->faker->numberBetween(10, 100),
            'current_stock' => $this->faker->numberBetween(0, 100),
            'observation' => $this->faker->sentence,
        ];
    }
}
