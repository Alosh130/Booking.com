<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
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
            'review' => fake()->paragraph(),
            'rating' => fake()->randomNumber(1,5)
        ];
    }

    public function good(){
        return $this->state(function (array $attr){
            return [
                'rating'=>fake()->numberBetween(4,5)
            ];
        });
    }

    public function average(){
        return $this->state(function(array $attr){
            return [
                'rating'=>fake()->numberBetween(3,4)
            ];
        });
    }

    public function bad(){
        return $this->state(function(array $attr){
            return [
                'rating'=>fake()->numberBetween(1,2)
            ];
        });
    }

    
}
