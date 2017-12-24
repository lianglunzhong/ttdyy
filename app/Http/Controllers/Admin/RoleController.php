<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Role;

class RoleController extends CommonController
{
    public function rolesList(Request $request, Role $role)
    {
    	$roles = $role->all();

    	return view('admin.role.list')
    			->with('page_header', 'Role')
    			->with('page_header_desc', 'list')
                ->with('roles', $roles);
    }
}
