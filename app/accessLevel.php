<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accessLevel extends Model
{
    public function account()
    {
        return $this->belongsTo('account');
    }
    protected $table = 'access_level';
	
	    protected $fillable = [
        'id', 'name', 
    ];
}
