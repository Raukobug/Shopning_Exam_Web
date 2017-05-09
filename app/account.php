<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{

    protected $table = 'user';

    public function shop()
    {
        return $this->belongsTo('App\shop');
    }
    public function accessLevel()
    {
        return $this->belongsTo('App\accessLevel');
    }
}
