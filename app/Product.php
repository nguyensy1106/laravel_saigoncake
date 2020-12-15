<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $table = 'products' ;
    protected $fillable = [ 'name_product', 'url_image', 'category_id', 'slug', 'price_sell', 
    'price_discount', 'description', 'status', 'id_user' ];

    public function category()
    {
    	return $this->belongsTo('App\Category','category_id');
    }

    public function comment()
    {
    	return $this->hasMany('App\Comment');
    }

    public function orderdetail()
    {
        return $this->hasMany('App\OrderDetail');
    }

     public function wishlist()
    {
        return $this->hasMany('App\Wishlist');
    }



}
