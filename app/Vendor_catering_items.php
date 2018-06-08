<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_catering_items extends Model
{
    protected $table = 'vendor_deal_item';

    protected $fillable = [
        'menu_id','item_name','service_id'
    ];
}
