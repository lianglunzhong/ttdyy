<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MovieImage extends Model
{
    
    public function movie()
    {
    	return $this->belongsTo('App\Model\Movie');
    }
}
