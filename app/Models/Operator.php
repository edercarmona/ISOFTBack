<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    protected $table='operators';
    protected $primaryKey = 'operator_id';
    protected $fillable = array('operator_id','operator_name','operator_station');

    public function station()
    {
      return $this->belongsTo(Station::class, 'operator_station', 'station_id');
    }
    public function sale()
    {
      return $this->hasMany(Sale::class, 'sale_operator', 'operator_id');
    }
}
