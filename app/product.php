<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function item()
    {
        return $this->hasMany('App\item');
    }
    protected $table = 'product';
}
