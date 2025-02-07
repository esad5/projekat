<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Usluga;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usluga>
 */
class UslugaFactory extends Factory
{
    protected $model = Usluga::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->numberBetween(1,1000),
            'date' => Carbon::now(),
            'grade' =>$this->faker->numberBetween(1,5),
            'description' => 'Obicni opis',
            'majstor' =>$this->faker->numberBetween(1,10),
            'car' =>$this->faker->numberBetween(1,10),
        ];
    }
}
