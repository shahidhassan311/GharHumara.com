<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_service_type extends Model
{
    protected $table = 'vendor_service_type';

    protected $fillable = [
        'service_type','image'
    ];
}
