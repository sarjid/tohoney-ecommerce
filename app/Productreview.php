<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productreview extends Model
{

            protected $fillable = [
                'name', 'product_id', 'email', 'review','status',
            ];

        public function review_product(){
            return $this->hasOne(Product::class,'id','product_id');
        }
}
