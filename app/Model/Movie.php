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
    	return $this->belongsMany('App\Model\Category');
    }
}
