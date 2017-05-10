<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\shop');
    }
    public function product()
    {
        return $this->belongsTo('App\product');
    }
    public function visitStatistic()
    {
        return $this->belongsTo('App\visitStatistic');
    }
    protected $table = 'item';
}
