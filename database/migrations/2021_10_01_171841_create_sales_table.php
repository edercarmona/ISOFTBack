<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('sale_id');
            $table->integer('sale_station')->nullable($value = false)->unsigned();
            $table->integer('sale_pump')->nullable($value = false)->unsigned();
            $table->integer('sale_operator')->nullable($value = false)->unsigned();
            $table->timestamps();
            $table->foreign('sale_station')->references('station_id')->on('stations');
            $table->foreign('sale_pump')->references('pump_id')->on('pumps');
            $table->foreign('sale_operator')->references('operator_id')->on('operators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
