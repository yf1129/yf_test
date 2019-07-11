<?php

namespace App\Http\Controllers\Admin;

use App\Model\Operate;
use Illuminate\Http\Request;
use App\Http\Requests\OperateRequest;
use App\Http\Controllers\Controller;
use Session;

class OperateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Operate::get();
        return view('admin/operate/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/operate/create');
    }

    /**
     * Store a newly created resource in storage.
     * 添加标签名称操作
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperateRequest $request, Operate $model)
    {
        $request['created_at'] = date('Y-m-d H:i:s');
        return $model->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $status = Operate::destroy($id);
        if ($status) {
            return response()->json(['code' => 200, 'message' => '删除成功']);
        } else {
            return response()->json(['code' => 4401, 'message' => '删除失败']);
        }
    }
}
