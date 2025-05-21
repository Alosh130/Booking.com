<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\facility;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\facility>
 */
class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_id' =>null,
            'name' => fake()->name,
            'free' => fake()->boolean(),
            'icon' => fake()->randomElement(facility::$icons),
        ];
    }
}
