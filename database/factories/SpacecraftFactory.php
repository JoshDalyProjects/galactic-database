<?php

namespace Database\Factories;

use App\Models\SpacecraftModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SpacecraftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->str(10),
            'class' => 'Spaceship',
            'price' => $this->faker->doubleval,
            'crew' => '10',
            'status' => 'Defunct'
        ];
    }
}
