<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable = [
        'product_id', 'quantity','ip_address',
    ];


    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }

}
