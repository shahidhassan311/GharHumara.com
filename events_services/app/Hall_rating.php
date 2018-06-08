<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall_rating extends Model
{
    protected $table = 'hall_rating';

    protected $fillable = [
        'user_id','hall_id','rating'
    ];
}
