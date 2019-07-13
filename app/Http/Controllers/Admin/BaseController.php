<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    /**
     * BaseController constructor.
     * 登录路由验证
     */
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /**
     * 返回成功信息
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success($message)
    {
        return response()->json(['code' => 200, 'message' => $message]);
    }

    /**
     * 返回错误信息
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function error($message)
    {
        return response()->json(['code' => 4401, 'message' => $message]);
    }
}
