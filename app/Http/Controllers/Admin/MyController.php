<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        echo 33;
    }
}
