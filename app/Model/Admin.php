<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    
    protected $table = 'admins';

    protected $fillable = [
    	'name', 'email', 'password'
    ];

    protected $hidden = [
    	'password', 'remember_token'
    ];

    public function role()
    {
    	return $this->belongsTo('App\Model\Role');
    }
}
