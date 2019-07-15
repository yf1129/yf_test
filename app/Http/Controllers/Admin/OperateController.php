<?php

namespace App\Http\Controllers\Admin;

use App\Model\Operate;
use Illuminate\Http\Request;
use App\Http\Requests\OperateRequest;
use Session;

class OperateController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * 获取标签列表页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Operate::get();
        return view('admin/operate/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 添加标签页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/operate/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * 添加标签名称操作
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperateRequest $request, Operate $model)
    {
        dd($request->all());
        $request['created_at'] = date('Y-m-d H:i:s');
        $status = $model->create($request->all());

        if ($status) {
            return $this->success('添加成功');
        } else {
            return $this->success('添加失败');
        }
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
     * 编辑标签页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Operate::find($id);

        if ($model) {
            return view('admin.operate.edit', compact('model'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * 更新标签操作
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Operate::find($id);
        $model['name'] = $request['name'];
        $status = $model->save();
        if ($status) {
            return $this->success('编辑成功');
        } else {
            return $this->success('编辑失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * 删除标签操作
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Operate::destroy($id);

        if ($status) {
            return $this->success('删除成功');
        } else {
            return $this->success('删除失败');
        }
    }
}
