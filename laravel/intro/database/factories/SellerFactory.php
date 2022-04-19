<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SellerFactory extends Factory
{
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->word(),
            'dni' => $this->faker->unique()->word(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone' => $this->faker->regexify('\+505\d{8}'),
        ];
    }
}
