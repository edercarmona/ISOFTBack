<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    protected $table='users';
    protected $primaryKey = 'user_id';

    protected $fillable = array('user_name','user_email','user_password','user_phone','user_dire');

    protected $hidden = ['created_at','updated_at', 'user_password',  'remember_token'];

    use HasFactory;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function ticket()
    {
      return $this->hasMany(Ticket::class, 'ticket_user', 'user_email');
    }
    public function point()
    {
      return $this->hasMany(Point::class, 'point_user', 'user_email');
    }
    public function win()
    {
      return $this->hasMany(Win::class, 'win_user', 'user_email');
    }
    public function taxe()
    {
      return $this->hasMany(Taxe::class, 'taxe_user', 'user_email');
    }

}
