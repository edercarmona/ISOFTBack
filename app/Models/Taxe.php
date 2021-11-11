<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxe extends Model
{
  use HasFactory;
  protected $primaryKey = 'taxe_id';
  protected $fillable = array('taxe_id', 'taxe_user','taxe_company','taxe_rfc','taxe_email');

  public function user()
  {
    return $this->belongsTo(User::class, 'taxe_user', 'user_email');
  }
}
