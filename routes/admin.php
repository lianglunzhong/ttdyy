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

    $router->group(['prefix' => 'movie'], function($router)
    {
        //movie
        $router->get('/movie/list', 'MovieController@moviesList')->name('movie.list');
        $router->get('/movie/add', 'MovieController@showAddForm')->name('movie.add');
        $router->post('/movie/store', 'MovieController@store')->name('movie.store');
        $router->get('/movie/edit', 'MovieController@addAdminsData');

        //movie category
        $router->get('/category/list', 'CategoryController@categoryList')->name('category.list');
        $router->post('/category/store', 'CategoryController@store')->name('category.store');

        //movie country
        $router->get('/country/list', 'CountryController@countryList')->name('country.list');
        $router->post('/country/store', 'CountryController@store')->name('country.store');
    });
    

});