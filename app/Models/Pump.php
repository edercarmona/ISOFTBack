<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pump extends Model
{
    use HasFactory;
    protected $table='pumps';
    protected $primaryKey = 'pump_id';
    protected $fillable = array('pump_id','pump_station','pump_fuel');

    public function station()
    {
      return $this->belongsTo(Station::class, 'pump_station', 'station_id');
    }
    public function fuel()
    {
      return $this->belongsTo(Fuel::class, 'pump_fuel', 'fuel_id');
    }
    public function sale()
    {
      return $this->hasMany(Sale::class, 'sale_pump', 'pump_id');
    }
}
