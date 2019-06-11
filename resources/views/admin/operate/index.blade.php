@extends('admin.layout.master')

@section('content')
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li class="layui-this">网站设置</li>
            <li>用户管理</li>
            <li>权限分配</li>
            <li>添加标签</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">内容1</div>
            <div class="layui-tab-item">
                <table id="admin_demo" lay-filter="admin_filter"></table>
            </div>
            <div class="layui-tab-item">内容3</div>
            <div class="layui-tab-item">内容4</div>
        </div>
    </div>

    <script>
        layui.use('table', function(){
            var table = layui.table;

            //第一个实例
            table.render({
                elem: '#admin_demo'
                ,height: 312
                // ,url: '/demo/table/user/' //数据接口
                ,page: true //开启分页
                ,cols: [[ //表头
                    {field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
                    ,{field: 'username', title: '用户名', width:80}
                    ,{field: 'sex', title: '性别', width:80, sort: true}
                    ,{field: 'city', title: '城市', width:80}
                    ,{field: 'sign', title: '签名', width: 177}
                    ,{field: 'experience', title: '积分', width: 80, sort: true}
                    ,{field: 'score', title: '评分', width: 80, sort: true}
                    ,{field: 'classify', title: '职业', width: 80}
                    ,{field: 'wealth', title: '财富', width: 135, sort: true}
                ]]
            });

        });
    </script>

@endsection
