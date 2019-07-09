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
            'question' => "Hoe maak een een Template aan?",
            'answer' => "Zodra je bent ingelogt kan je een template aan maken op de pagina Templates onder het kopje Mail. Links boven vin je een formulier veld waar je een naam voor je template kan opgeven, zodra je de template aan maakt word hij onderaan toegevoegd en kan je deze bewerken met het potlood icon",
        ]);

        DB::table('faqs')->insert([
            'question' => "Hoe verander ik mijn mail pakket?",
            'answer' => "Zodra je bent ingelogt vind je op de Account pagina een bewerk knop, hiermee kan je jou account gegevens wijzigen en zo ook een ander pakket kiezen, ook moet je opnieuw je Credit Card gegeven opgeven.",
        ]);
    }
}
