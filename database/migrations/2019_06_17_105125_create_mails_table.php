<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('message');
            $table->dateTime('send_at')->nullable();
            #$table->unsignedBigInteger('user_id');
            #$table->foreign('user_id')->references('id')->on('users');
            #$table->unsignedBigInteger('templates_id');
            #$table->foreign('templates_id')->references('id')->on('templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
