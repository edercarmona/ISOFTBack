<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('promotion_id');
            $table->string('promotion_name',100)->nullable($value = false);
            $table->string('promotion_description',255)->nullable($value = false);
            $table->date('promotion_stardate')->nullable($value = false);
            $table->date('promotion_enddate')->nullable($value = false);
            $table->boolean('promotion_active')->default(1);
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
        Schema::dropIfExists('promotions');
    }
}
