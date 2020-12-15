<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public $table='comments';
    protected $fillable = ['id_user', 'id_product', 'comment'];

    public function product()
    {
    	return $this->belongsTo('App\Product','id_product');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','id_user');
    }

}
