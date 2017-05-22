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
    protected $table = 'item';
	
	protected $fillable = ['product_id', 'shop_id', 'quantity', 'price', 'expirationdate'];
}
