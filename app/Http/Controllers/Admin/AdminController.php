<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;

class AdminController extends CommonController
{
    public function adminsList(Request $request)
    {
    	return view('admin.admins.list')
    			->with('page_header', 'Admins')
    			->with('page_header_desc', 'list');
    }
}
