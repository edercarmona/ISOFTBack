<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
          $table->string('ticket_id',50);
          $table->integer('ticket_promotion')->nullable($value = false)->unsigned();
          $table->integer('ticket_sale')->nullable($value = false)->unsigned();
          $table->string('ticket_user',100)->nullable($value = false);
          $table->integer('ticket_points')->nullable($value = false)->unsigned();
          $table->boolean('ticket_active')->default(1);
          $table->timestamps();
          $table->foreign('ticket_promotion')->references('promotion_id')->on('promotions');
          $table->foreign('ticket_sale')->references('sale_id')->on('sales');
          $table->foreign('ticket_user')->references('user_email')->on('users');
          $table->primary('ticket_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
