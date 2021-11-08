<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
          $table->increments('point_id');
          $table->integer('point_promotion')->nullable($value = false)->unsigned();
          $table->string('point_user',100)->nullable($value = false);
          $table->integer('point_cant')->nullable($value = false)->unsigned();
          $table->boolean('point_status')->default(1);
          $table->timestamps();
          $table->foreign('point_promotion')->references('promotion_id')->on('promotions');
          $table->foreign('point_user')->references('user_email')->on('users');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
