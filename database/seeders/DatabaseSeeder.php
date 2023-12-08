<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            Kategorije_seeder::class,
            Usluge_seeder::class,
            Users_seeder::class,
            Zahtevi_seeder::class,
        ]);
    }
}
