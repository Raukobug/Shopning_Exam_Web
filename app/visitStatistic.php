<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitStatistic extends Model
{
        public function visitStatistic()
    {
        return $this->belongsTo('App\item');
    }
    protected $table = 'visit_statistic';
}
