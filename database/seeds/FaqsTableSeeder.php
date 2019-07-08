<?php

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('faqs')->insert([
            'question' => "Hoe maak ik een email aan?",
            'answer' => "Zodra je bent ingelogt kan je een template aan maken en een email lijst aan maken zodra deze zijn aangemaakt kan je op de berichten pagina een nieuw bericht maken met je mail lijst en mail template en deze vervolgens versturen.",
        ]);

        DB::table('faqs')->insert([
            'question' => "Hoe maak ik een email aan?",
            'answer' => "Zodra je bent ingelogt kan je een template aan maken en een email lijst aan maken zodra deze zijn aangemaakt kan je op de berichten pagina een nieuw bericht maken met je mail lijst en mail template en deze vervolgens versturen.",
        ]);

        DB::table('faqs')->insert([
            'question' => "Hoe maak ik een email aan?",
            'answer' => "Zodra je bent ingelogt kan je een template aan maken en een email lijst aan maken zodra deze zijn aangemaakt kan je op de berichten pagina een nieuw bericht maken met je mail lijst en mail template en deze vervolgens versturen.",
        ]);

        DB::table('faqs')->insert([
            'question' => "Hoe maak ik een email aan?",
            'answer' => "Zodra je bent ingelogt kan je een template aan maken en een email lijst aan maken zodra deze zijn aangemaakt kan je op de berichten pagina een nieuw bericht maken met je mail lijst en mail template en deze vervolgens versturen.",
        ]);

        DB::table('faqs')->insert([
            'question' => "Hoe maak ik een email aan?",
            'answer' => "Zodra je bent ingelogt kan je een template aan maken en een email lijst aan maken zodra deze zijn aangemaakt kan je op de berichten pagina een nieuw bericht maken met je mail lijst en mail template en deze vervolgens versturen.",
        ]);
    }
}
