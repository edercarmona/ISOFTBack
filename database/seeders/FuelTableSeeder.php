<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FuelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('fuels')->insert([
          'fuel_id' => 1,
          'fuel_name' => 'Gasolina',
          'fuel_description' => 'Combustible Tipo Gasolina'
      ]);
      \DB::table('fuels')->insert([
          'fuel_id' => 2,
          'fuel_name' => 'Diesel',
          'fuel_description' => 'Combustible tipo Diesel'
      ]);
    }
}
