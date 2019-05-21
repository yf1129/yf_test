<?php

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| 这是后台相关的路由 --TODO
|
*/

Auth::routes();

/************* 后台登录相关 ***************/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //后台登录视图
    Route::get('login', 'AdminController@loginView');
    //登录操作
    Route::post('login', 'AdminController@opLogin');
    //后台登录后主页
    Route::any('index', 'AdminController@index')->middleware('admin.auth');
});


