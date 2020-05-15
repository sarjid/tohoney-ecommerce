<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_list extends Model
{
   
            protected $fillable = [
                'user_id', 'order_id','product_id','quantity'
            ];
}
