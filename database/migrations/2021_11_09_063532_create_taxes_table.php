<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
          $table->increments('taxe_id');
          $table->string('taxe_user',100)->nullable($value = false);
          $table->string('taxe_company',100)->nullable($value = false);
          $table->string('taxe_rfc',13)->nullable($value = false);
          $table->string('taxe_email',100)->nullable($value = false);
          $table->timestamps();
          $table->foreign('taxe_user')->references('user_email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxes');
    }
}
