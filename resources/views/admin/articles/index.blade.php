@extends('admin.layout.master')

@section('content')
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li class="layui-this">文章管理</li>
            <li>添加文章</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table" lay-filter="articles_filter" id="articles_demo">
                    <thead>
                        <tr>
                            <th lay-data="{align:'center'}">ID</th>
                            <th lay-data="{align:'center'}">作者</th>
                            <th lay-data="{align:'center'}">文章描述</th>
                            <th lay-data="{align:'center'}">文章是否属于热门</th>
                            <th lay-data="{align:'center'}">文章是否属于推荐</th>
                            <th lay-data="{align:'center'}">文章是否删除</th>
                            <th lay-data="{align:'center'}">文章阅读量</th>
                            <th lay-data="{align:'center'}">创建时间</th>
                            <th lay-data="{align:'center'}">操作</th>
                        </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($data as $d)--}}
                        <tr>
{{--                            <td lay-data="{align:'center'}">{{ $d['id'] }}</td>--}}
{{--                            <td lay-data="{align:'center'}">{{ $d['name'] }}</td>--}}
{{--                            <td lay-data="{align:'center'}">{{ $d['describe'] }}</td>--}}
{{--                            <td lay-data="{align:'center'}">{{ $d['articles_hot'] }}</td>--}}
{{--                            <td lay-data="{align:'center'}">{{ $d['recommended'] }}</td>--}}
{{--                            <td lay-data="{align:'center'}">{{ $d['is_del'] }}</td>--}}
{{--                            <td lay-data="{align:'center'}">{{ $d['reading_num'] }}</td>--}}
{{--                            <td lay-data="{align:'center'}">{{ $d['created_at'] }}</td>--}}
                            <td lay-data="{align:'center'}">
                                <div class="btn-group btn-group-sm" name_id="">
                                    <a class="btn btn-success edit-tag" href="javascript:;" name="">添加</a>
                                    <a class="btn btn-success edit-tag" href="javascript:;" name="">编辑</a>
                                    <a class="btn btn-success edit-tag" href="javascript:;" name="">推荐</a>
                                    <a class="btn btn-success edit-tag" href="javascript:;" name="">上热门</a>
                                    <a class="btn btn-danger del-tag" href="javascript:;">删除</a>
                                </div>
                            </td>
                        </tr>
{{--                    @endforeach--}}
                    </tbody>
                </table>
            </div>
            <div class="layui-tab-item">
                <form class="layui-form layui-form-pane" action="">
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" lay-verify="title" lay-reqtext="标题是必填项，岂能为空？"  autocomplete="off" placeholder="请输入标题" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">描述</label>
                        <div class="layui-input-block">
                            <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">预览图</label>
                        <div class="layui-input-block">
                            <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">文章内容</label>
                        <div class="layui-input-block">
                            <textarea class="layui-textarea" name="content" lay-verify="content" id="LAY_demo_editor"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">推荐</label>
                        <div class="layui-input-block">
                            <input type="radio" name="sex" value="1" title="否">
                            <input type="radio" name="sex" value="2" title="是">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">上热门</label>
                        <div class="layui-input-block">
                            <input type="radio" name="sex" value="1" title="不上">
                            <input type="radio" name="sex" value="2" title="上">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="articles_demo">添加文章</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        layui.use(['form','table','layer', 'layedit'], function () {
            var $ = layui.jquery
                , form = layui.form
                , table = layui.table
                , layer = layui.layer
                , layedit = layui.layedit;
            form.render();

            //监听提交
            form.on('submit(formOperate)', function(data) {
                var datas = (data.field);

                var title_msg = ''; //弹窗提示语
                $.post('/admin/operate', datas, function (res,status) {
                    if (res.code === 200){
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

            //标签编辑
            $('.edit-tag').click(function () {
                var id = $(this).parent().attr('name_id');
                var name = this.name;

                var html = '<div class="layui-form layui-form-pane" style="padding: 30px 30px 0 30px;">\n' +
                    '                    {{ csrf_field() }}\n' +
                    '                    <div class="layui-form-item">\n' +
                    '                        <label class="layui-form-label">标签内容</label>\n' +
                    '                        <div class="layui-input-block">\n' +
                    '                            <input id="tag_name" type="text" lay-verify="required" placeholder="请输入新标签名称" autocomplete="off" class="layui-input" value="'+name+'">\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '\n' +
                    '                </div>';

                layer.open({
                    type: 1
                    , content: html
                    , title: '编辑标签'
                    , btn: ['编辑标签', '取消']
                    , yes: function (index, layero) {
                        var tag_name = $('#tag_name').val();
                        console.log(tag_name);

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '/admin/operate/' + id,
                            method: 'PUT',
                            data: {
                                name: tag_name
                            },
                            dataType: 'json',
                            async: false,
                            cache: false,
                            success: function (e) {
                                console.log(e);
                                var title_msg = '';
                                var anim = 0;
                                if (e.code === 200){
                                    title_msg = '编辑标签成功';
                                    anim = 4;
                                } else {
                                    title_msg = '编辑标签失败';
                                    anim = 6;
                                }
                                layer.msg(title_msg, {icon: 1, anim: anim}, function () {
                                    location.reload();
                                });
                            },
                            error: function (e) {
                                console.log((e));
                                var html = '';
                                var errors = e.responseJSON.errors;
                                if (e.status === 500) {
                                    html = e.statusText
                                } else {
                                    //配置一个透明的询问框
                                    $.each(errors, function (index) {
                                        html += errors[index][0] + "<br/>";
                                    });
                                }

                                layer.msg(html, {icon: 7, anim: 6});//3s后自动关闭
                            }
                        });
                    }
                });
            });

            //标签删除
            $('.del-tag').click(function () {
                var id = $(this).parent().attr('name_id');

                layer.confirm('是否删除标签？', {icon: 3, title:'媛飞工作室温馨提示'}, function(index){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/admin/operate/' + id,
                        method: 'DELETE',
                        async: false,
                        cache: false,
                        success: function (e) {
                            var title_msg = '';
                            var anim = 0;
                            if (e.code === 200){
                                title_msg = '删除标签成功';
                                anim = 4;
                            } else {
                                title_msg = '删除标签失败';
                                anim = 6;
                            }
                            layer.msg(title_msg, {icon: 1, anim: anim}, function () {
                                location.reload();
                            });
                        }
                    });
                });
            });
        });
    </script>

@endsection
