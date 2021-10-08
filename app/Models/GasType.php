<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasType extends Model
{
    use HasFactory;
    protected $table='gas_types';
    protected $primaryKey = 'gas_id';
    protected $fillable = array('gas_id','gas_name','gas_description','gas_fuel');

    public function fuel()
    {
      return $this->belongsTo(Fuel::class, 'gas_fuel', 'fuel_id');
    }
}
