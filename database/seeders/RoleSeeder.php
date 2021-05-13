<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'user_id' => 2,
            'role' => 'basic'
        ]);
        DB::table('roles')->insert([
            'user_id' => 3,
            'role' => 'basic'
        ]);
        DB::table('roles')->insert([
            'user_id' => 4,
            'role' => 'basic'
        ]);
        DB::table('roles')->insert([
            'user_id' => 5,
            'role' => 'basic'
        ]);
        DB::table('roles')->insert([
            'user_id' => 6,
            'role' => 'basic'
        ]);
        DB::table('roles')->insert([
            'user_id' => 7,
            'role' => 'basic'
        ]);
        DB::table('roles')->insert([
            'user_id' => 8,
            'role' => 'basic'
        ]);
        DB::table('roles')->insert([
            'user_id' => 9,
            'role' => 'basic'
        ]);
        DB::table('roles')->insert([
            'user_id' => 10,
            'role' => 'basic'
        ]);
    }
}
