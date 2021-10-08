<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
  use HasFactory;
  protected $primaryKey = 'detail_id';
  protected $fillable = array('detail_id','detail_sale','detail_group','detail_product'
  ,'detail_quantity','detail_price');

  public function sale()
  {
    return $this->belongsTo(Sale::class, 'detail_sale', 'sale_id');
  }
}
