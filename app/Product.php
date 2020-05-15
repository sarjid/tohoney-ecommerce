<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'subcategory_id','product_name','product_price','product_quantity','short_description','long_description','product_thambnail','status',
    ];

    // realtion
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    // realtion
    public function review(){
        return $this->hasOne(Productreview::class,'id','product_id');
    }


}
