<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->increments('product_id');
          $table->string('product_name',100)->nullable($value = false);
          $table->string('product_description',255)->nullable($value = false);
          $table->double('product_price',6,2)->nullable($value = false);
          $table->string('product_group',2)->nullable($value = false);
          $table->timestamps();
          $table->foreign('product_group')->references('group_id')->on('product_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
