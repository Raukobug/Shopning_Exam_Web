<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    public function account()
    {
        return $this->hasMany('App\account');
    }
    public function openingHour()
    {
        return $this->hasMany('App\OpeningHour');
    }
	public function visitStatistic()
    {
        return $this->hasMany('App\visitStatistic');
    }
	
    protected $table = 'shop';
	
	protected $fillable = [
        'id', 'name', 
    ];	

}
