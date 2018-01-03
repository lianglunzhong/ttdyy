<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name'];

    public function movies()
    {
    	return $this->belongsToMany('App\Model\Movie', 'movie_category');
    }
}
