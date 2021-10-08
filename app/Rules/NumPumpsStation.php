<?php

namespace App\Rules;
use App\Models\Station;
use App\Models\Pump;
use App\Models\Fuel;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class NumPumpsStation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($station, $fuel)
    {
        $this->station = $station;
        $this->fuel = $fuel;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $maxpumps= DB::table('stations')->where('station_id', $this->station)->first();
        $totalpumps = $maxpumps->station_gas + $maxpumps->station_diesel;
        $numpumps =  Pump::where('pump_station', '=', $this->station)
                          ->where('pump_fuel', '=', $this->fuel)
                          ->count();
        if($this->fuel == 1){
          if($numpumps + 1 <= $maxpumps->station_gas){
            return True;
          }else{
            return False;
          }
        }else{
          if($numpumps + 1 <= $maxpumps->station_diesel){
            return True;
          }else{
            return False;
          }
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Se ha alcanzado el Numero Maximo de Bombas';
    }
}
