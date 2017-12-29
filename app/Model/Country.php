<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = ['name'];

    public function movies()
    {
    	return $this->hasMany('App\Model\Movie');
    }
}
