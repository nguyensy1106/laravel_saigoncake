<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $table='category_product';
    protected $fillable = ['name_category', 'url_image', 'slug', 'status','id_user'];

    public function product()
    {
    	return $this->hasMany('App\Product');
    }
}
