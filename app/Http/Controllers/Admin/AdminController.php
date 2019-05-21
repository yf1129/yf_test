<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

/**
 * Class AdminController
 * @package App\Http\Controllers\Admin
 */
class AdminController extends Controller
{
    /********** 后台管理人员相关 ***************/
    public function __construct()
    {
//        $this->middleware('admin.auth')->only('index');
    }

    /**
     * 登录视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginView()
    {
        return view('admin.login');
    }

    /**
     * 登录操作
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function opLogin(Request $request)
    {
        $status = Auth::guard('admin')->attempt([
            'tellphone' => $request->input('tellphone'),
            'password' => $request->input('password'),
        ]);

        if ($status) {
            //登录成功 true
            return redirect('admin/index');
        } else {
            //登录失败 false
            return redirect('admin/login')->with('error', '用户名或密码错误');
        }
    }

    /**
     * @return string
     */
    public function index()
    {
        return 'aa';
    }
}
