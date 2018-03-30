<?php

namespace App\Model\Lol;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'lnk_type', 'content', 'cate_id', 'publish_at'];

    public static function addNews($data)
    {
    	return self::create($data);
    }
}
