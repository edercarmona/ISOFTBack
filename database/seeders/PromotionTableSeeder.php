<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('promotions')->insert([
          'promotion_id' => 4,
          'promotion_name' => 'Puntos Servi Gaseolo',
          'promotion_description' => 'Gana Fabulosos premios',
          'promotion_stardate' => '20210901',
          'promotion_enddate' => '20220630',
      ]);
    }
}
