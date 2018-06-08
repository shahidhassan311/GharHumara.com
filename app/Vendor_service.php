<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_service extends Model
{
    protected $table = 'vendor_service';

    protected $fillable = [
        'service_company','service_name','amount','details','type'
    ];
}
