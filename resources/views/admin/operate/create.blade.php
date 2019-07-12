@extends('admin.layout.master')

@section('content')
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li><a href="/admin/operate/index">标签管理</a></li>
            <li>标签编辑</li>
            <li class="layui-this">添加标签</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item">内容1</div>
            <div class="layui-tab-item">内容2</div>
            <div class="layui-tab-item layui-show">
                <form class="layui-form layui-form-pane" action="/admin/operate" method="post">
                    {{ csrf_field() }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">标签内容</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" required  lay-verify="required" placeholder="请输入新标签名称" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" type="submit" lay-filter="formOperate">添加</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
