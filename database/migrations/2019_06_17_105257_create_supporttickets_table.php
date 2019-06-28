<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportticketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supporttickets', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('users_id')->unsigned();
            $table->string('question');
            $table->longText('message');
            $table->longText('answer')->nullable();
            $table->timestamp('date');
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supporttickets');
    }
}
