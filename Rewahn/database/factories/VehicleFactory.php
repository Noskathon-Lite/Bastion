<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'title' => $this->faker->name(),
//            'brand' => $this->faker->company(),
//            'model' => $this->faker->word(),
//            'plate' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{3}'),
            'category_id' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->sentence(),
            'daily_rate' => $this->faker->randomFloat(2, 100, 500),
            'fuel_capacity' => $this->faker->randomFloat(2, 10, 50),
            'gps_enabled' => $this->faker->boolean(),
            'gps_type' => $this->faker->optional()->randomElement(['mobile', 'iot']),
            'status' => $this->faker->randomElement(['available', 'rented', 'maintenance', 'suspended']),
        ];
    }
}
