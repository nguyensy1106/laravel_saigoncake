<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public $table='wishlist';
    protected $fillable = [ 'id_user', 'id_product'];

    public function product()
    {
    	return $this->belongsTo('App\Product','id_product');
    }
}
