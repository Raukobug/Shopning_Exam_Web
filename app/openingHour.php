<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class openingHour extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\shop');
    }
    protected $table = 'opening_hour';
}
