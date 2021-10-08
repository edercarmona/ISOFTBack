<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
          $table->increments('station_id');
          $table->string('station_name', 100)->unique();
          $table->string('station_razon',255)->nullable($value = false);
          $table->string('station_rfc',12)->nullable($value = false);
          $table->string('station_dire', 255)->nullable($value = false);
          $table->string('station_mpo', 50)->nullable($value = false);
          $table->string('station_edo', 50)->nullable($value = false);
          $table->string('station_cp', 5)->nullable($value = false);
          $table->string('station_phone', 10)->nullable($value = false);
          $table->smallInteger('station_gas')->nullable($value = false);
          $table->smallInteger('station_diesel')->nullable($value = false);
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
        Schema::dropIfExists('stations');
    }
}
