@extends('admin.layout.master')

@section('content')
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li>网站设置</li>
            <li>用户管理</li>
            <li>权限分配</li>
            <li class="layui-this">添加标签</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item">内容1</div>
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
            <div class="layui-tab-item layui-show">
                <form class="layui-form layui-form-pane" action="/admin/ooperate" method="post">
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

    <script>
        layui.use('form', function () {
           var $ = layui.jquery
               , form = layui.form;

            //监听提交
            // form.on('submit(formOperate)', function(data){
            //     var datas = (data.field);
            //     console.log(datas);
            //     $.post('/admin/operate', datas, function (res) {
            //         console.log(res);
            //     });
            //     /*$.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         type: 'POST',
            //         url: '/admin/modifypwd',
            //         data: datas,
            //         dataType: 'json',
            //         async: false,
            //         cache: false,
            //         success: function (data) {
            //             console.log((data));
            //         },
            //         error: function (e) {
            //             console.log((e));
            //             var errors = e.responseJSON.errors;var html = '';
            //             var html = '';
            //             //配置一个透明的询问框
            //             $.each(errors, function (index) {
            //                 html += errors[index][0] + "<br/>";
            //             });
            //
            //             layer.msg(html, {icon: 7, time: 3000});//3s后自动关闭
            //
            //         }
            //     });*/
            //
            //     // $.ajaxSettings.async = false;
            //     // $.post('/admin/modifypwd', datas, function (res, status) {
            //     //     console.log((status));
            //     // }, 'json').error(function(xhr,errorText,errorType){
            //     //     var errors = xhr.responseJSON.errors;
            //     //     console.log(errors);
            //     //     var html = '';
            //     //     //配置一个透明的询问框
            //     //     $.each(errors, function (index) {
            //     //         html += errors[index][0] + "<br/>";
            //     //     });
            //     //
            //     //     layer.msg(html, {icon: 7, time: 3000});//3s后自动关闭
            //     // });
            //     // layer.msg(html, {icon: 7, time: 3000});//3s后自动关闭
            //     // // return false;
            //     // $.ajaxSettings.async = true;
            // });
        });
    </script>

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
