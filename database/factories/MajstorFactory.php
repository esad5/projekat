<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Driver;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Majstor>
 */
class MajstorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'lastname'=>$this->faker->lastname(),
            'level'=>$this->faker->numberBetween(1,5),
            'description' =>'Opis majstora',
        ];
    }
}
