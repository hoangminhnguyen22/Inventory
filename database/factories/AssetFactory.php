<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->postcode(),
            'location_id' => 1,
            'name' => fake()->name(),
            'category_id' => 2,
            'condition' => fake()->randomDigitNot(6,7,8,9),
            'purchase_id' => 3,
            'price' => fake()->biasedNumberBetween($min = 100, $max = 1000, $function = 'sqrt'),
            'note' => fake()->text($maxNbChars = 50) ,
        ];
    }
}
