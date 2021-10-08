<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PumpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('pumps')->insert([
          'pump_id' => 4,
          'pump_station' => 4,
          'pump_fuel' => 1,
      ]);
      \DB::table('pumps')->insert([
          'pump_id' => 3,
          'pump_station' => 4,
          'pump_fuel' => 2,
      ]);
    }
}
