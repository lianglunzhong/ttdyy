<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Admin;

class AdminController extends CommonController
{
    public function adminsList(Request $request, Admin $admin)
    {   
        $admins = $admin->all();

        // dd($admins);

    	return view('admin.admins.list')
    			->with('page_header', 'Admins')
    			->with('page_header_desc', 'list')
                ->with('admins', $admins);
    }

    public function addAdminsData(Request $request)
    {
    	for($i=1; $i< 200; $i++) {
    		$admin = new Admin;
    		$admin->name = 'admin' . $i;
    		$admin->email = 'admin' . $i .'@ttdyy.com';
    		$admin->password = bcrypt('111111');
    		$admin->role_id = 1;
    		$admin->save();
    	}
 
    	dd('done');
    }
}
