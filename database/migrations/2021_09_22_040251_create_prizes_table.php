<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prizes', function (Blueprint $table) {
          $table->increments('prize_id');
          $table->string('prize_name',255)->nullable($value = false);
          $table->integer('prize_points')->nullable($value = false);
          $table->integer('prize_promotion')->nullable($value = false)->unsigned();
          $table->boolean('prize_active')->default(1);
          $table->integer('prize_stock')->nullable($value = false);
          $table->string('prize_description',255)->nullable($value = false);
          $table->timestamps();
          $table->foreign('prize_promotion')->references('promotion_id')->on('promotions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prizes');
    }
}
