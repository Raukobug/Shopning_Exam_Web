<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class openingHour extends Model
{
    public function shop()
     {
         return $this->belongsTo('shop');
     }
	 
    protected $table = 'opening_hour';
}
