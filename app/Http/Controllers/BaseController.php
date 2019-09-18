<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * BaseController constructor.
     * 登录路由验证
     */
    public function __construct()
    {
//        $this->middleware('auth.index');
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


    protected function resultReturn($data, $totalPage, $totalNum)
    {
        $message['total_page'] = $totalPage;
        $message['total_num'] = $totalNum;
        $message['data'] = $data;
        return response()->json(['code' => 200, 'message' => $message]);
    }
}
