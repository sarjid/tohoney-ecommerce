<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'name', 'post_id', 'email', 'comment','status',
    ];

    // join 

    public function post(){
        return $this->hasOne(Blog::class,'id','post_id');
    }

}
