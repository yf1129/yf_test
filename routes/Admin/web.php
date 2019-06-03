<?php

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| 这是后台相关的路由 --TODO
|
*/

/************* 后台登录相关 ***************/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //后台登录视图
    Route::any('login', 'AdminController@loginView');
    //登录操作
    Route::post('login', 'AdminController@opLogin');
    //后台登录后主页
    Route::any('index', 'AdminController@indexView');
    //退出
    Route::any('logout', 'AdminController@logout');
});


