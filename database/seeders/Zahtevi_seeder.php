<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class zahtevi_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            \App\Models\Zahtev::create([
                'datumUsluge' => $faker->dateTimeBetween('-1 years', 'now'),
                'user_id' => rand(1, 25),
                'usluga_id' => rand(1, 4),
            ]);
        }
    }
}
