<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Win extends Model
{
  use HasFactory;
  protected $primaryKey = 'win_id';
  protected $fillable = array('win_id', 'win_promotion','win_user','win_prize','win_status');

  public function promotion()
  {
    return $this->belongsTo(Promotion::class, 'win_promotion', 'promotion_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'win_user', 'user_email');
  }

  public function prize()
  {
    return $this->belongsTo(Prize::class, 'win_prize', 'prize_id');
  }
}
