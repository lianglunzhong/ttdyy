<?php

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    // $router->post('logout', 'LoginController@logout')->name('admin.logout');
    $router->get('logout', 'LoginController@logout');

    //dashboard
    $router->get('/', 'DashboardController@index')->name('admin.dashboard');

    //admins
    $router->get('/auth/admin/list', 'AdminController@adminsList')->name('admin.list');
    $router->get('/auth/role/list', 'RoleController@rolesList')->name('role.list');
    $router->get('/add/admin', 'AdminController@addAdminsData');

    //movie category
    $router->get('/movie/category/list', 'CategoryController@categoryList')->name('category.list');
    $router->get('/movie/category/add', 'CategoryController@showAddForm')->name('category.add');
    $router->post('/movie/category/add', 'CategoryController@Add');

});