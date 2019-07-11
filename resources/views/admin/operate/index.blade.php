@extends('admin.layout.master')

@section('content')
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li class="layui-this">用户管理</li>
            <li>权限分配</li>
            <li>添加标签</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table" lay-filter="admin_filter" id="admin_demo">
                    <thead>
                        <tr>
                            <th lay-data="{align:'center'}">ID</th>
                            <th lay-data="{align:'center'}">用户名</th>
                            <th lay-data="{align:'center'}">创建时间</th>
                            <th lay-data="{align:'center'}">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td lay-data="{align:'center'}">{{ $d['id'] }}</td>
                            <td lay-data="{align:'center'}">{{ $d['name'] }}</td>
                            <td lay-data="{align:'center'}">{{ $d['created_at'] }}</td>
                            <td lay-data="{align:'center'}">
                                <div class="btn-group btn-group-sm">
                                    <a class="btn btn-success" href="'admin/opeate/{{ $d['id'] }}">编辑</a>
                                    <a class="btn btn-danger del-tag" href="javascript:;" name="{{ $d['id'] }}">删除</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="layui-tab-item">内容3</div>
            <div class="layui-tab-item">
                <div class="layui-form layui-form-pane">
                    {{ csrf_field() }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">标签内容</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" lay-verify="required" placeholder="请输入新标签名称" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="formOperate">添加</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        layui.use(['form','table','layer'], function () {
            var $ = layui.jquery
                , form = layui.form
                , table = layui.table
                , layer = layui.layer;

            //监听提交
            form.on('submit(formOperate)', function(data) {
                var datas = (data.field);

                var title_msg = ''; //弹窗提示语
                $.post('/admin/operate', datas, function (res,status) {
                    if (! $.isEmptyObject(res) && status === 'success') {
                        title_msg = '添加标签成功';
                    } else {
                        title_msg = '添加标签失败';
                    }
                    layer.msg(title_msg, {icon: 7, time: 3000, title: '媛飞工作室 -- 温馨提示'}, function (index) {
                        window.location.replace('/admin/operate');
                    });
                }, 'json').error(function(xhr,errorText,errorType){
                    var errors = xhr.responseJSON.errors;
                    //配置一个询问框
                    $.each(errors, function (index) {
                        title_msg += errors[index][0] + "<br/>";
                    });
                    layer.msg(title_msg, {icon: 7, time: 3000, title: '媛飞工作室 -- 温馨提示'});//3s后自动关闭
                });
            });
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

            //标签删除
            $('.del-tag').click(function () {
                var id = this.name;
                layer.confirm('是否删除标签？', {icon: 3, title:'媛飞工作室温馨提示'}, function(index){
                    //do something
                    console.log(22);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/admin/operate/' + id,
                        method: 'DELETE',
                        async: false,
                        cache: false,
                        success: function (e) {
                            layer.msg(e.message, {icon: 1,time: 2000}, function () {
                                location.reload();
                            });
                        }
                    });
                });
            });
        });
    </script>

@endsection
