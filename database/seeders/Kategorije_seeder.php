<?php

namespace Database\Seeders;

use App\Models\Kategorija;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Kategorije_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategorije = [
            'Obrazovanje',
            'Zdravstvo',
            'Kultura',
            'Sport',
            'Porodice'
        ];

        foreach ($kategorije as $kategorija) {
            Kategorija::create([
                'nazivKategorije' => $kategorija
            ]);
        }
    }
}
