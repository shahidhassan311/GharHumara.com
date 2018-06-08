<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hall_images extends Authenticatable
{
    protected $table = 'hall_images';

    protected $fillable = [
        'images', 'hall_id', 'sec_id','theme_id','service_id',
    ];

}
