<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
 
    protected $fillable = [
        'user_id', 'full_name','email','phone_number','address','post_code','city','notes','payment_option',
    ];
}
