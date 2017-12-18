<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;

class DashboardController extends AdminController
{
    
    public function index(Request $request)
    {
    	return view('admin.dashboard.index');
    	// dd('dashboard,当前用户名：' . auth('admin')->user()->name);
    }
}
