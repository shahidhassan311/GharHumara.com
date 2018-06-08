<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_photography_images extends Model
{
    protected $table = 'vendor_photography_images';

    protected $fillable = [
        'vendor_photography_id','images'
    ];
}
