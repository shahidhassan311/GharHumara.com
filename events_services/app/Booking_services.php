<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_services extends Model
{
    protected $table = 'booking_services';

    protected $fillable = [
        'booking_id','service_id'
    ];
}
