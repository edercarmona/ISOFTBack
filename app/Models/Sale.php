<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $primaryKey = 'sale_id';
    protected $fillable = array('sale_id','sale_station','sale_pump','sale_operator','created_at' );

    public function station()
    {
      return $this->belongsTo(Station::class, 'sale_station', 'station_id');
    }
    public function pump()
    {
      return $this->belongsTo(Pump::class, 'sale_pump', 'pump_id');
    }
    public function operator()
    {
      return $this->belongsTo(Operator::class, 'sale_operator', 'operator_id');
    }
    public function detail()
    {
      return $this->hasMany(Detail::class, 'detail_sale', 'sale_id');
    }

    public function ticket()
    {
      return $this->hasMany(Ticket::class, 'ticket_promotion', 'sale_id');
    }
}
