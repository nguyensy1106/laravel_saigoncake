<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $table='order_details';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price' ];

    public function order()
	{
		return $this->belongsTo('App\Order','order_id');
	}

	 public function product()
	{
		return $this->belongsTo('App\Product','product_id');
	}

}