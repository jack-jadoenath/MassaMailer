<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('packages')->insert([
            'name' => "Email Pakket Brons",
            'limitlist' => 5,
            'limitmails' => 10,
            'limittemplates' => 5,
            'price' => 5.00
        ]);

        DB::table('packages')->insert([
            'name' => "Email Pakket Zilver",
            'limitlist' => 20,
            'limitmails' => 30,
            'limittemplates' => 10,
            'price' => 10.00
        ]);

        DB::table('packages')->insert([
            'name' => "Email Pakket Goud",
            'limitlist' => 50,
            'limitmails' => 75,
            'limittemplates' => 15,
            'price' => 15.00
        ]);
        DB::table('packages')->insert([
            'name' => "Email Pakket Diamant",
            'limitlist' => 50,
            'limitmails' => 75,
            'limittemplates' => 15,
            'price' => 15.00
        ]);
        DB::table('packages')->insert([
            'name' => "Email Pakket Emarald",
            'limitlist' => 50,
            'limitmails' => 75,
            'limittemplates' => 15,
            'price' => 15.00
        ]);
        DB::table('packages')->insert([
            'name' => "Email Pakket Platina",
            'limitlist' => 50,
            'limitmails' => 75,
            'limittemplates' => 15,
            'price' => 15.00
        ]);
    }
}
