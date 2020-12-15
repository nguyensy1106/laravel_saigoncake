<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table='orders';
    protected $fillable = ['code_order', 'id_customer', 'address_ship', 'phone', 'date_ship',
    'money_subtotal', 'id_coupon', 'id_fee', 'money_pay', 'note', 'payment', 
	'status_payment', 'status_shipping'];

	public function orderdetail()
	{
		return $this->hasMany('App\OrderDetail');
	}

	public function user()
	{
		return $this->belongsTo('App\User','id_customer');
	}

	public function shipping()
	{
		return $this->belongsTo('App\Shipping','id_fee');
	}

	public function coupon()
	{
		return $this->belongsTo('App\Coupon','id_coupon');
	}

}
