<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Admin\Admin;
use Session;

class MyController extends Controller
{
    public function __construct()
    {
        if (empty(Auth::guard('admin')->user())) {
//            dd(Auth::guard('admin')->user());
            return redirect('admin/login');
        }
    }

    /**
     * 修改密码视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modifyPwdView()
    {
        return view('admin.modifypwd');
    }

    /**
     * @param AdminPost $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 修改密码操作
     */
    public function modifyPwd(AdminPost $request)
    {
        $model = Auth::guard('admin')->user();
        $model->password = bcrypt($request['password']);
        $status = $model->save();

        if ($status) {
            Session::flash('modify_msg', '修改密码成功');//删除session中的admin值
        } else {
            Session::flash('modify_msg', '修改密码失败');
        }
        return redirect('admin/modifypwd');
    }
}
