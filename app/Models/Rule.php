<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $table='rules';
    protected $primaryKey = 'rule_id';
    protected $fillable = array('rule_id','rule_name',
    'rule_points','rule_liters','rule_active','rule_promotion','rule_description');

    public function promotion()
    {
      return $this->belongsTo(Promotion::class, 'rule_promotion', 'promotion_id');
    }
}
