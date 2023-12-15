<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KategorijaFactory extends Factory
{

    public function definition()
    {
        return [
            'nazivKategorije' => $this->faker->word(),
        ];
    }
}
