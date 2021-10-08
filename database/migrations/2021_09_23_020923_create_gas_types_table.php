<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_types', function (Blueprint $table) {
          $table->string('gas_id',2);
          $table->string('gas_name',100)->nullable($value = false);
          $table->string('gas_description',255)->nullable($value = false);
          $table->integer('gas_fuel')->nullable($value = false)->unsigned();
          $table->timestamps();
          $table->primary('gas_id');
          $table->unique('gas_name');
          $table->foreign('gas_fuel')->references('fuel_id')->on('fuels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gas_types');
    }
}
