<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  
    protected $fillable = [
        'banner_title', 'banner_description', 'banner_image',
    ];
    
}
