<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    protected $fillable = [
        'coupon_name', 'discount_amount', 'validity_till',
    ];

}
