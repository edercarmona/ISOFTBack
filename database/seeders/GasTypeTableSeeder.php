<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GasTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('gas_types')->insert([
          'gas_id' => 1,
          'gas_name' => 'MG',
          'gas_description' => 'Gasolina Verde',
          'gas_fuel' => 1
      ]);
      \DB::table('gas_types')->insert([
          'gas_id' => 2,
          'gas_name' => 'PR',
          'gas_description' => 'Gasolina Roja',
          'gas_fuel' => 1
      ]);
    }
}
