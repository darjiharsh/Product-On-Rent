<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_name',
        'user_email',
        'user_password',
        'user_address',
        'user_photo',
        'user_details',
    ];
}
