<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'name' => 'Valorant',
            'genre' => 'Shooter'
        ]);

        DB::table('games')->insert([
            'name' => 'F1-2021',
            'genre' => 'Sport'
        ]);

        DB::table('games')->insert([
            'name' => 'Residen Evil Village',
            'genre' => 'Action'
        ]);
        DB::table('games')->insert([
            'name' => 'Dragon Ball Z Kakarot',
            'genre' => 'Action'
        ]);
        DB::table('games')->insert([
            'name' => 'Mortal Kombat 11',
            'genre' => 'Arcade'
        ]);
        DB::table('games')->insert([
            'name' => 'League of Legends',
            'genre' => 'Battle Arena'
        ]);
        DB::table('games')->insert([
            'name' => 'Fifa 21',
            'genre' => 'Sport'
        ]);
        DB::table('games')->insert([
            'name' => 'Phasmophobia',
            'genre' => 'Terror'
        ]);
        DB::table('games')->insert([
            'name' => 'NBA 2k21',
            'genre' => 'Sport'
        ]);
        DB::table('games')->insert([
            'name' => 'Warzone',
            'genre' => 'Shooter'
        ]);
    }
}
