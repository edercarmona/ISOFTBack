<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_groups', function (Blueprint $table) {
          $table->string('group_id',2);
          $table->string('group_name',100)->nullable($value = false);
          $table->integer('group_supply')->nullable($value = false)->unsigned();
          $table->timestamps();
          $table->foreign('group_supply')->references('supply_id')->on('supplies');
          $table->primary('group_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_groups');
    }
}
