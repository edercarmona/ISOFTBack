<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table='promotions';
    protected $primaryKey = 'promotion_id';
    protected $fillable = array('promotion_id','promotion_name',
    'promotion_description','promotion_startdate','promotion_enddate','promotion_active');

    public function prize()
    {
      return $this->belongsTo(Prize::class, 'prize_promotion', 'promotion_id');
    }
    public function rule()
    {
      return $this->hasMany(Rule::class, 'rule_promotion', 'promotion_id');
    }
}
