<?php

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    // $router->post('logout', 'LoginController@logout')->name('admin.logout');
    $router->get('logout', 'LoginController@logout');

    $router->get('/', 'DashboardController@index');
});