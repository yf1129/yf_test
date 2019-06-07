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
    Route::get('login', 'AdminController@loginView');
    //登录操作
    Route::post('login', 'AdminController@opLogin');
    //后台登录后主页
    Route::any('index', 'AdminController@indexView');
    //退出
    Route::any('logout', 'AdminController@logout');
    //修改密码视图
    Route::get('modifypwd', 'MyController@modifyPwdView');
    //修改密码操作
    Route::post('modifypwd', 'MyController@modifyPwd');
    //标签
    Route::resource('operate', 'OperateController');
});


