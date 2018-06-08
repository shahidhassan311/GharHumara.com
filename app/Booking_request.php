<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Booking_request extends Authenticatable
{
    protected $table = 'booking_request';

    protected $fillable = [
        'booking_date', 'hall_role_type_id','hall_id', 'user_id','status','message',
    ];

}
