<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasFactory;
    protected $table='prizes';
    protected $primaryKey = 'promotion_id';
    protected $fillable = array('prize_id','prize_name','prize_points','prize_promotion','prize_active', 'prize_stock', 'prize_description');

    public function promotion()
    {
      return $this->hasMany(Promotion::class, 'prize_promotion', 'promotion_id');
    }
}
