<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = [
        'category_id', 'comment_id','added_by','title','description', 'image', 'status',
    ];

    public function user(){
        return $this->hasOne(User::class,'id','added_by');
    }
}
