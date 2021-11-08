<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $primaryKey = 'point_id';
    protected $fillable = array('point_id', 'point_promotion','point_user','point_cant','point_status');

    public function promotion()
    {
      return $this->belongsTo(Promotion::class, 'point_promotion', 'promotion_id');
    }

    public function user()
    {
      return $this->belongsTo(User::class, 'point_user', 'user_email');
    }
}
