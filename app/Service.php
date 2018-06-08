<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Service extends Authenticatable
{
    protected $table = 'service';

    protected $fillable = [
        'hall_id', 'service_name'
    ];

}
