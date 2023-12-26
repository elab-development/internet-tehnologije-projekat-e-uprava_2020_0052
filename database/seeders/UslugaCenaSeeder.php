<?php

namespace Database\Seeders;

use App\Models\Usluga;
use Illuminate\Database\Seeder;

class UslugaCenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usluge = Usluga::all();

        foreach ($usluge as $usluga) {
            $usluga->update([
                'cenaUsluge' => rand(100, 1000)
            ]);
        }
    }
}
