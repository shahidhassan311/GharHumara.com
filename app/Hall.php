<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hall extends Authenticatable
{
    protected $table = 'hall';

    protected $fillable = [
        'user_id', 'hall_name', 'contact','email','address','cover_images','status',
    ];

}
