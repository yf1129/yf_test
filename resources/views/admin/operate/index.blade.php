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
                <table class="layui-table" lay-data="{height:315, url:'/demo/table/user/', page:true, id:'admin_demo'}" lay-filter="admin_filter">
                    <thead>
                    <tr>
                        <th lay-data="{field:'id', width:80, sort: true}">ID</th>
                        <th lay-data="{field:'username', width:80}">用户名</th>
                        <th lay-data="{field:'sex', width:80, sort: true}">性别</th>
                        <th lay-data="{field:'city'}">城市</th>
                        <th lay-data="{field:'sign'}">签名</th>
                        <th lay-data="{field:'experience', sort: true}">积分</th>
                        <th lay-data="{field:'score', sort: true}">评分</th>
                        <th lay-data="{field:'classify'}">职业</th>
                        <th lay-data="{field:'wealth', sort: true}">财富</th>
                    </tr>
                    </thead>
                </table>
{{--                <table id="admin_demo" lay-filter="admin_filter"></table>--}}
            </div>
            <div class="layui-tab-item">内容3</div>
            <div class="layui-tab-item">
                <form class="layui-form" action="">
                    <div class="layui-form-item">
                        <label class="layui-form-label">管理员名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="admin_name" required  lay-verify="required" placeholder="请输入管理员名称" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">密码</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">请输入5-10位的英文或数字</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">性别</label>
                        <div class="layui-input-block">
                            <input type="radio" name="sex" value="1" title="男" checked>
                            <input type="radio" name="sex" value="2" title="女">
                            <input type="radio" name="sex" value="0" title="保密">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

   {{-- <script>
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
    </script>--}}

@endsection
