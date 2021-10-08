<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('stations')->insert([
          'station_id' => 4,
          'station_name' => 'ANTIOPIA',
          'station_razon' => 'Servi Gasoleo S. de RL. de C.V.',
          'station_rfc' => 'SGS07111877R',
          'station_dire' => 'Calle Antiopía 225 Sur',
          'station_mpo' =>'Canalope',
          'station_edo' => 'Nayarit',
          'station_cp' => '44221',
          'station_phone' => '2281092986',
          'station_gas' => '12',
          'station_diesel' => '2',
      ]);
    }
}
