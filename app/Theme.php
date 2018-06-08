<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Theme extends Authenticatable
{
    protected $table = 'theme';

    protected $fillable = [
        'hall_id', 'amount', 'detail'
    ];

}
