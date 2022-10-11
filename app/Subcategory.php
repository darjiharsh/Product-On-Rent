<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $primaryKey = 'subcategory_id';

    protected $fillable = [
        'subcategory_name',
        'category_id'
    ];
}
