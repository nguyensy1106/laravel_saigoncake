<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $table='coupons';
    protected $fillable = ['coupon_name', 'coupon_code', 'coupon_number', 'coupon_money', 'coupon_condition', 'date_current', 'date_expiration', 'id_user'];

    public function order()
	{
		return $this->hasMany('App\Order');
	}
}
