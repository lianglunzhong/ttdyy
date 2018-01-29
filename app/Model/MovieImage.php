<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MovieImage extends Model
{
	protected $table = 'movie_images';

    protected $fillable = ['url', 'position', 'default', 'visible', 'movie_id'];

    public function movie()
    {
    	return $this->belongsTo('App\Model\Movie');
    }
}
