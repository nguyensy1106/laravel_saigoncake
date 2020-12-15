<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    public $table='blogs';
    protected $fillable = ['name_blog', 'description', 'introduct', 'slug', 'status' ,'url_image','id_user'];
}
