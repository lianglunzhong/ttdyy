<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function admins()
    {
    	return $this->hasMany('App\Model\Admin');
    }
}
