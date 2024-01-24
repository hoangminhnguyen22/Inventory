<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'serial' => fake()->unique()->postcode(),
            'warranty' => fake()->randomDigitNot(6),
            'supplier_id' => 1,
            'model_id' => 1,
            'manufactorer_id' => 1,
        ];
    }
}
