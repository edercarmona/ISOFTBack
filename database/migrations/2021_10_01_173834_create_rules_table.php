<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->increments('rule_id');
            $table->string('rule_name',255)->nullable($value = false);
            $table->integer('rule_points')->nullable($value = false);
            $table->integer('rule_liters')->nullable($value = false);
            $table->boolean('rule_active')->default(1);
            $table->integer('rule_promotion')->nullable($value = false)->unsigned();
            $table->string('rule_description',255)->nullable($value = false);
            $table->timestamps();
            $table->foreign('rule_promotion')->references('promotion_id')->on('promotions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules');
    }
}
