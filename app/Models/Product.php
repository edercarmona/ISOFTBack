<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $fillable = array('product_id','product_name','product_description','product_price','product_group' );

    public function group()
    {
      return $this->belongsTo(ProductGroup::class, 'product_group', 'group_id');
    }
}
