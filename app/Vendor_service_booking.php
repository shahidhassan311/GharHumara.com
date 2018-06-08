<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_service_booking extends Model
{
    protected $table = 'vendor_service_booking';

    protected $fillable = [
        'service_type','service_id','date','details'
    ];
}
