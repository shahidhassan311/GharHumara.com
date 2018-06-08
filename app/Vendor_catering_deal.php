<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_catering_deal extends Model
{
    protected $table = 'vendor_catering_deal';

    protected $fillable = [
        'service_id','course_name','per_head'
    ];
}
