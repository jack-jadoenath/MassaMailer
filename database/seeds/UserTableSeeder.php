<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Admin Account',
            'email' => 'admin@massamailer.nl',
            'phone' => '+31640867131',
            'password' => bcrypt('Admin123'),
            'admin' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'User Account',
            'email' => 'user@massamailer.nl',
            'phone' => '0640867131',
            'password' => bcrypt('User123')
        ]);
    }
}
