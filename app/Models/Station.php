<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table='stations';
    protected $primaryKey = 'station_id';
    protected $fillable = array('station_id',
    'station_name',
    'station_razon',
    'station_rfc',
    'station_dire',
    'station_mpo',
    'station_edo',
    'station_cp',
     'station_phone',
     'station_gas',
      'station_diesel');

    public function pump()
    {
      return $this->hasMany(Pump::class, 'pump_station', 'station_id');
    }
    public function operator()
    {
      return $this->hasMany(Operator::class, 'operator_station', 'station_id');
    }
    public function sale()
    {
      return $this->hasMany(Sale::class, 'sale_station', 'station_id');
    }
    use HasFactory;
}
