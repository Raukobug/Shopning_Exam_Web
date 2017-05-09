<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    public function account()
    {
        return $this->belongsTo('account');
    }
    protected $table = 'shop';
}
