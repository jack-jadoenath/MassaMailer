<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1MailinglistsRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mailinglist_recipients', function (Blueprint $table) {
            $table->foreign('mailinglists_id')->references('id')->on('mailinglists')->onDelete('cascade');;
            $table->foreign('recipients_id')->references('id')->on('recipients')->onDelete('cascade');;
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
