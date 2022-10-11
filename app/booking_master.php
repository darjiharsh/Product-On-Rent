<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking_master extends Model
{
    protected $primaryKey = 'booking_master_id';

    protected $fillable = [
        'date',
        'user_id',
        'total',
        'status',
        'booking_status',
        'payment_method',
        'shipping_name',
        'shipping_mobile',
        'shipping_address',
        'state',
        'city',
        'pincode',
        'special_note'
    ];
}
