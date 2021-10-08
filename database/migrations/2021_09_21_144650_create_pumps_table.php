<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePumpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pumps', function (Blueprint $table) {
          $table->integer('pump_id')->nullable($value = false)->unsigned();
          $table->integer('pump_station')->nullable($value = false)->unsigned();
          $table->integer('pump_fuel')->nullable($value = false)->unsigned();
          $table->timestamps();
          $table->foreign('pump_station')->references('station_id')->on('stations');
          $table->foreign('pump_fuel')->references('fuel_id')->on('fuels');
          $table->primary(['pump_id','pump_station','pump_fuel']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pumps');
    }
}
