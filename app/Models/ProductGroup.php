<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductGroup extends Model
{
    use HasFactory;
    protected $primaryKey = 'group_id';
    protected $fillable = array('group_id','group_name','group_supply' );

    public function supply()
    {
      return $this->belongsTo(Supply::class, 'group_supply', 'supply_id');
    }
    public function product()
    {
      return $this->hasMany(Product::class, 'product_supply', 'group_id');
    }
}
