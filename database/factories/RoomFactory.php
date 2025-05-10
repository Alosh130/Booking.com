<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_id' => null,
            'bed_type' => fake()->randomElement(Room::$bed_types),
            'num_of_beds' => fake()->numberBetween(1,3),
            'free_breakfast' =>fake()->boolean(),
            'free_cancellation' => fake()->boolean(),
            'no_prepayment' => fake()->boolean(),
            'price_per_night' => fake()->numberBetween(50,1000),
            'minimum_price' => fake()->numberBetween(50,100),
            'service_charge' => 0.08,
            'city_tax' => 0.04,
        ];
    }

    public function fake_rooms(int $hotelId){
        return $this->state(function (array $attr) use ($hotelId){
            return 
            [
                'hotel_id' => $hotelId,
                'room_type' => fake()->randomElement(Room::$room_types[$hotelId])
            ];
        });
    }

        
        
        
}
