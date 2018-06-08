<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hall_role_type extends Authenticatable
{
    protected $table = 'hall_roll_type';

    protected $fillable = [
        'hall_id', 'section_name', 'seating','amount','detail',
    ];

}
