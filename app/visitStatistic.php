<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitStatistic extends Model
{
    public function shop()
    {
        return $this->belongsTo('shop');
    }
    protected $table = 'visit_statistic';
	
	protected $fillable = [
        'id', 'shop_id', 'visit_count', 'unique_visit_count'
    ];	
}
