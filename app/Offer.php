<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $primaryKey = 'offer_id';

    protected $fillable = [
        'offer_title',
        'offer_details',
        'offer_start_date',
        'offer_end_date'
    ];
}
