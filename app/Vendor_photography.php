<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_photography extends Model
{
    protected $table = 'vendor_photography';

    protected $fillable = [
        'service_id','company_name','price','details','rating','profile_image'
    ];
}
