<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wins', function (Blueprint $table) {
          $table->increments('win_id');
          $table->string('win_user',100)->nullable($value = false);
          $table->integer('win_promotion')->nullable($value = false)->unsigned();
          $table->integer('win_prize')->nullable($value = false)->unsigned();
          $table->boolean('win_status')->default(1);
          $table->timestamps();
          $table->foreign('win_promotion')->references('promotion_id')->on('promotions');
          $table->foreign('win_user')->references('user_email')->on('users');
          $table->foreign('win_prize')->references('prize_id')->on('prizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wins');
    }
}
