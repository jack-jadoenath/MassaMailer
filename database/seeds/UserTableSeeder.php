<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'packages_id' => 3,
            'admin' => 1,
            'last_payment' => Carbon::now(),
            'card_last_four' => 4356
        ]);
        DB::table('users')->insert([
            'name' => 'User Account',
            'email' => 'user@massamailer.nl',
            'phone' => '0640867131',
            'packages_id' => 1,
            'password' => bcrypt('User123'),
            'last_payment' => Carbon::now(),
            'card_last_four' => 2345
        ]);
        DB::table('users')->insert([
            'name' => 'Pietje Puk',
            'email' => 'PietjePuk@gmail.com',
            'phone' => '+31612345465',
            'password' => bcrypt('Pietje123'),
            'packages_id' => 3,
            'last_payment' => Carbon::now(),
            'card_last_four' => 3456
        ]);
        DB::table('users')->insert([
            'name' => 'Gerrit De Jager',
            'email' => 'gerrit@gmail.nl',
            'phone' => '0654789234',
            'packages_id' => 1,
            'password' => bcrypt('Gerrit123'),
            'last_payment' => Carbon::now(),
            'card_last_four' => 5467
        ]);
        
    }
}
