<?php

namespace App\Model\Lol;

use Illuminate\Database\Eloquent\Model;

class NewsCate extends Model
{
    protected $fillable = ['name'];

    public static function addCate($data) {
    	return self::create($data);
    }
}
