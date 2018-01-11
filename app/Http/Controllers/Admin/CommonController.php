<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth.admin:admin');
    }

    public function showTest(Request $request)
    {
    	return view('admin.test')
    			->with('page_header', 'Test')
                ->with('page_header_desc', 'test');
    }

    public function test(Request $request)
    {
        dd($request->file('images'));
    	if($request->hasFile('images')) {
    		foreach($request->file('images') as $file) {
	    		var_dump(111);
	    	}
	    	// dd($request->file('images'));
	    	dd('test');
    	} else {
    		dd('dd');
    	}
    	
    }
}
