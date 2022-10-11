<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'booking_status',
        'booking_master',
        'booking_time',
        'booking_date',
        'booking_duration',
        'booking_amount',
        'booking_address',
        'user_id',
        'product_id'
    ];
}
