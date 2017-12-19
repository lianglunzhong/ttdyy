<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;

class DashboardController extends CommonController
{
    
    public function index(Request $request)
    {
    	return view('admin.dashboard.index')
    			->with('page_header', 'Dashboard')
    			->with('page_header_desc', '');
    	// dd('dashboard,当前用户名：' . auth('admin')->user()->name);
    }
}
