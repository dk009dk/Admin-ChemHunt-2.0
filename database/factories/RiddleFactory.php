<?php

namespace Database\Factories;

use App\Models\Riddle;
use Illuminate\Database\Eloquent\Factories\Factory;

class RiddleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Riddle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question'=>$this->faker->paragraph,
            'answer'=>$this->faker->text('15'),
            'day'=>$this->faker->randomElement([1,2,3,4,5,6,7]),
        ];
    }
}
