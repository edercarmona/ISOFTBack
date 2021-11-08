<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $primaryKey = 'ticket_id';
    protected $fillable = array('ticket_id', 'ticket_promotion','ticket_sale','ticket_user','ticket_points','ticket_active');

    public function promotion()
    {
      return $this->belongsTo(Promotion::class, 'ticket_promotion', 'promotion_id');
    }

    public function sale()
    {
      return $this->belongsTo(Sale::class, 'ticket_sale', 'sale_id');
    }

    public function user()
    {
      return $this->belongsTo(User::class, 'ticket_user', 'user_email');
    }
}
