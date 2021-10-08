<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;
    protected $primaryKey = 'supply_id';
    protected $fillable = array('supply_id','supply_name',);

    public function group()
    {
      return $this->hasMany(ProductGroup::class, 'group_supply', 'supply_id');
    }
}
