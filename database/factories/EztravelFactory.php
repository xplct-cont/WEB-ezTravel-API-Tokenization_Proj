<?php

namespace Database\Factories;

use App\Models\Eztravel;
use Illuminate\Database\Eloquent\Factories\Factory;

class EztravelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Eztravel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'origin' => $this->faker->word,
        'destination' => $this->faker->word,
        'flight_no' => $this->faker->word,
        'departure_date' => $this->faker->word,
        'arrival_date' => $this->faker->word,
        'passenger_name' => $this->faker->word,
        'age' => $this->faker->randomDigitNotNull,
        'travel_class' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
