<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parties')->insert([
            'name' => 'Valobobos',
            'game_id' => 1
        ]);

        DB::table('parties')->insert([
            'name' => 'Challengers Only',
            'game_id' => 6
        ]);

        DB::table('parties')->insert([
            'name' => 'Messis FC',
            'game_id' => 7
        ]);

        DB::table('parties')->insert([
            'name' => 'Call of Noobs',
            'game_id' => 10
        ]);
        
        DB::table('parties')->insert([
            'name' => 'Los Cazafantasmas',
            'game_id' => 8
        ]);

        DB::table('parties')->insert([
            'name' => 'Saiyan Team',
            'game_id' => 4
        ]);

        DB::table('parties')->insert([
            'name' => 'Mamba4Ever',
            'game_id' => 9
        ]);
    }
}
