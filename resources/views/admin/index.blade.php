@extends('admin.layout.master')

@section('content')
    <blockquote class="layui-elem-quote" style="margin-top: 10px;">
        <div id="test2"></div>
    </blockquote>

    <div class="layui-carousel" id="test1">
        <div carousel-item>
            <div>条目1</div>
            <div>条目2</div>
            <div>条目3</div>
            <div>条目4</div>
            <div>条目5</div>
        </div>
    </div>

    <div style="padding: 20px; background-color: #F2F2F2;">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">卡片面板</div>
                    <div class="layui-card-body">
                        卡片式面板面板通常用于非白色背景色的主体内<br>
                        从而映衬出边框投影
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
