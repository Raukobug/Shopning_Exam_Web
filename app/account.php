<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $table = 'users';

    public function accessLevel()
    {
        return $this->belongsTo('App\accessLevel');
    }
    public function shop()
    {
        return $this->belongsTo('App\shop');
    }
    
}
