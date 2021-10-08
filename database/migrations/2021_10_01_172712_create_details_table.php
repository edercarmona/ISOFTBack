<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
          $table->increments('detail_id');
          $table->integer('detail_sale')->nullable($value = false)->unsigned();
          $table->string('detail_group',2)->nullable($value = false);
          $table->integer('detail_product')->nullable($value = false)->unsigned();
          $table->integer('detail_quantity')->nullable($value = false);
          $table->double('detail_price',8,2)->nullable($value = false);
          $table->timestamps();
          $table->foreign('detail_sale')->references('sale_id')->on('sales');
          $table->foreign('detail_product')->references('product_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
