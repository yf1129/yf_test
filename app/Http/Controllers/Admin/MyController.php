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
        $model->password = bcrypt($request['password']);
        $status = $model->save();
        if ($status) {
            Session::flash('modify_msg', '修改密码成功');//删除session中的admin值

            return redirect('admin/modifypwd');
        } else {
            Session::flash('modify_msg', '修改密码失败');
        }
    }
}
