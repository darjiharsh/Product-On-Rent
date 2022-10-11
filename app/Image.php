<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $primaryKey = 'image_id';

    protected $fillable = [

        'image_name',
        'image_path',
        'product_id'

    ];
}
