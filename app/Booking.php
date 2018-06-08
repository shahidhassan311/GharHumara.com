<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Booking extends Authenticatable
{
    protected $table = 'booking';

    protected $fillable = [
        'booking_date', 'hall_role_type_id','hall_id', 'user_id','status','message',
    ];

}
