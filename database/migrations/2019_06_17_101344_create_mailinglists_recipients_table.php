<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailinglistsRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailinglist_recipients', function (Blueprint $table) {
            $table->unsignedBigInteger('mailinglists_id');
            //$table->foreign('mailinglists_id')->references('id')->on('mailinglists');
            $table->unsignedBigInteger('recipients_id');
            //$table->foreign('recipients_id')->references('id')->on('recipients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailinglist_recipients');
    }
}
