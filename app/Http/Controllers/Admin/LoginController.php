<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
    	$this->middleware('guest')->except('logout');
    }

    /**
     * 重写登录视图页面
     * @return [type] [description]
     */
    public function showLoginForm()
    {
    	return view('admin.login.index');
    }

    /**
     * 自定义退出登录方法.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        //删除所有的session(包括前后台)
        // $request->session()->invalidate();

        return redirect('/admin');
    }
    

    /*
     * 重构guard,默认传个admin参数
     */
    public function guard()
    {
    	return auth()->guard('admin');
    }
}
