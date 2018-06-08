<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking_request';

    protected $fillable = [
        'booking_id','booking_date','user_id','message', 'status','hall_roll_type','theme_id'
    ];
}
