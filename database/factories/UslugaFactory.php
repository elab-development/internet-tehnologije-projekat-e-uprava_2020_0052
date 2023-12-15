<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UslugaFactory extends Factory
{

    public function definition()
    {
        return [
            'nazivUsluge' => $this->faker->word(),
            'opisUsluge' => $this->faker->text(200),
            'kategorija_id' => rand(1, 5),
        ];
    }
}
