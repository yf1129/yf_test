<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MyController extends Controller
{
    /**
     * 修改密码视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modifyPwdView()
    {
        return view('admin.modifypwd');
    }

    public function modifyPwd(AdminPost $request)
    {
        $model = Auth::guard('admin')->user();
dd($request->input('password'));
        echo 33;

    }
}
