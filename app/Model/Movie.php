<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    public function country()
    {
    	return $this->belongsTo('App\Model\Country');
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Model\Category', 'movie_category');
    }

    public function images()
    {
    	return $this->hasMany('App\Model\MovieImage');
    }
}
