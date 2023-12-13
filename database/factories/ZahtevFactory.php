<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ZahtevFactory extends Factory
{

    public function definition()
    {
        return [
            'datumUsluge' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'user_id' => rand(1, 25),
            'usluga_id' => rand(1, 4),
        ];
    }
}
