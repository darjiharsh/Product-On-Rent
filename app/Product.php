<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name',
        'product_details',
        'product_cost',
        'product_quantity',
        'product_note',
        'product_img_path',
        'subcategory_id',
        'vendor_id'
    ];
}
