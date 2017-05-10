<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    public function account()
    {
        return $this->belongsTo('account');
    }
    public function openingHour()
    {
        return $this->belongsTo('OpeningHour');
    }
    protected $table = 'shop';
}
