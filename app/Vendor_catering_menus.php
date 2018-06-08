<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_catering_menus extends Model
{
    protected $table = 'vendor_catering_menu';

    protected $fillable = [
        'vendor_catering_deal_id','menu_name','service_id'
    ];
}
