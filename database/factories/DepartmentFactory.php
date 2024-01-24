<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'floor' => fake()->randomDigitNot(0),
            'unit' => fake()->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
            'address' => fake()->address(),            
            'zipcode' => fake()->biasedNumberBetween($min = 100, $max = 1000, $function = 'sqrt'),
        ];
    }
}
