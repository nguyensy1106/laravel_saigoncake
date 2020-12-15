<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    public $table = 'ship_money' ;
    protected $fillable = [ 'district_name', 'money', 'id_user'];

     public function order()
	{
		return $this->hasMany('App\Order');
	}
}
