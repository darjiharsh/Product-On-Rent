<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $primaryKey = 'faq_id';

    protected $fillable = [
        'faq_que',
        'faq_ans'
    ];
}
