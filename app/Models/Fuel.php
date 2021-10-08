<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;
    protected $table='fuels';
    protected $primaryKey = 'fuel_id';
    protected $fillable = array('fuel_id','fuel_name','fuel_description');

    public function pump()
    {
      return $this->hasMany(Pump::class, 'pump_station', 'fuel_id');
    }
    public function gastype()
    {
      return $this->hasMany(GasType::class, 'gas_fuel', 'fuel_id');
    }
}
