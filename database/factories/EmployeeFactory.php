<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() :array
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->firstName,
            'patronymic' => $this->faker->lastName,
            'sex' => $this->faker->word,
            'salary' => $this->faker->buildingNumber,
        ];
    }
}
