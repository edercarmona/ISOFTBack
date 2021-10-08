<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
          $table->integer('operator_id')->unsigned();
          $table->string('operator_name',255)->nullable($value = false);
          $table->integer('operator_station')->nullable($value = false)->unsigned();
          $table->timestamps();
          $table->primary('operator_id');
          $table->foreign('operator_station')->references('station_id')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operators');
    }
}
