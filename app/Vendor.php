<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $primaryKey = 'vendor_id';

    protected $fillable = [

        'vendor_name',
        'vendor_email',
        'vendor_password',
        'vendor_gender',
        'vendor_address',
        'vendor_image_path'

    ];
}
