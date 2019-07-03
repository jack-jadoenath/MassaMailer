<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 15);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('admin')->nullable(); //Is deze gebruiker een admin ja (1) of nee (0)
            //$table->unsignedBigInteger('packages_id');
            //$table->foreign('packages_id')->references('id')->on('packages');
            $table->string('card_last_four', 4)->nullable();
            $table->timestamp('last_payment')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
