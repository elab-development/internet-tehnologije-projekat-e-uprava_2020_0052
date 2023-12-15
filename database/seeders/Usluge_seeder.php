<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Usluge_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usluge = [
            'Placanje taksi i racuna',
            'Izvod iz maticne knjige rodjenih',
            'Prijavi problem',
            'Zakazivanje termina',
        ];

        $faker = \Faker\Factory::create();

        foreach ($usluge as $usluga) {
            \App\Models\Usluga::create([
                'nazivUsluge' => $usluga,
                'opisUsluge' => $faker->text(200),
                'kategorija_id' => rand(1, 5),
            ]);
        }
    }
}
