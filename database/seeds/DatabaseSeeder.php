<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PackagesTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(UserTableSeeder::class);
        
    }
}
