<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcat extends Model
{


    protected $fillable = [
        'category_name', 'status',
    ];
}
