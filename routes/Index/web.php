<?php

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| 这是后台相关的路由 --TODO
|
*/

/************* 前端相关路由 ***************/
Route::group(['prefix' => 'index', 'namespace' => 'Index'], function () {
    //前端首页(未登录)视图
    Route::get('home', 'IndexController@homeView');
    //前端登录视图
    Route::get('login', 'IndexController@loginView');
    //登录操作
    Route::post('login', 'IndexController@opLogin');
    //前端登录后主页
    Route::any('index', 'IndexController@indexView');
    //退出
    Route::any('logout', 'IndexController@logout');
    //修改密码视图
    Route::get('modifypwd', 'MyController@modifyPwdView');
    //修改密码操作
    Route::post('modifypwd', 'MyController@modifyPwd');
    //resource操作
    Route::resource('operate', 'OperateController');
    //文章管理
    Route::resource('articles.html', 'IndexController@articleList');
});


