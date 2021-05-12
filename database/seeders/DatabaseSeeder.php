<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\GameSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //Users Seeds
        $this->call(AdminSeeder::class);
        User::factory(9)->create();

        //Games Seed
        $this->call(GameSeeder::class);
    }
}
