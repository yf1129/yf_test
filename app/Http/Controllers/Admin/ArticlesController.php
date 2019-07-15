<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Articles;
//use App\Model\Admin\User;
use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;
use App\Http\Controllers\Controller;

class ArticlesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * 文章管理主页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Articles::get();

        if (!empty($data)) {
            foreach ($data as $k=>$v) {
                $idModel = Articles::find($v['id'])->user()->get();
                if (!empty($idModel[0])) {
                    $data[$k]['author'] = $idModel[0]->name;
                } else {
                    $data[$k]['author'] = '匿名';
                }
            }
        }

        return view('admin.articles.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * 添加文章操作
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request, Articles $model)
    {
        $request->offsetSet('created_at', date('Y-m-d H:i:s'));
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
        $model = Articles::find($id);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
