@extends('admin.layout.master')

@section('content')
    <style>
        .layui-upload-img{width: 92px; height: 92px; margin: 0 10px 10px 0;}
        .articles-img-delete{position: absolute;margin: 5px 0 0 -40px;font-size: 24px;}
        a:hover{color: #0056b3;}
    </style>

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
                            <th lay-data="{align:'center'}">文章预览图</th>
                            <th lay-data="{align:'center'}">文章是否属于热门</th>
                            <th lay-data="{align:'center'}">文章是否属于推荐</th>
                            <th lay-data="{align:'center'}">文章是否删除</th>
                            <th lay-data="{align:'center'}">文章阅读量</th>
                            <th lay-data="{align:'center'}">创建时间</th>
                            <th lay-data="{align:'center'}">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td lay-data="{align:'center'}">{{ $d['id'] }}</td>
                            <td lay-data="{align:'center'}">{{ $d['author'] }}</td>
                            <td lay-data="{align:'center'}">
                                <a class="" href="javascript:;">{{ $d['describe'] }}</a>
                            </td>
                            <td lay-data="{align:'center'}"><img src="data:image/png;base64,{{ ($d['preview_photo']) }}" alt=""></td>
                            <td lay-data="{align:'center'}">
                                @if($d['is_hot'] === 2)
                                    {{  '热门' }}
                                @else
                                    {{  '非热门' }}
                                @endif
                            </td>
                            <td lay-data="{align:'center'}">
                                @if($d['recommended'] === 2)
                                    {{  '推荐' }}
                                @else
                                    {{  '非推荐' }}
                                @endif
                            </td>
                            <td lay-data="{align:'center'}">
                                @if($d['del_state'] === 2)
                                    {{  '已删除' }}
                                @else
                                    {{  '未删除' }}
                                @endif
                            </td>
                            <td lay-data="{align:'center'}">{{ $d['reading_num'] }}</td>
                            <td lay-data="{align:'center'}">{{ $d['created_at'] }}</td>
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
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="layui-tab-item">
                <div class="layui-form layui-form-pane">
                    {{ csrf_field() }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入文章标题" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">描述</label>
                        <div class="layui-input-block">
                            <input type="text" name="describe" lay-verify="required" placeholder="请输入文章描述" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">预览图</label>
                        <div class="layui-input-block">
                            <button type="button" class="layui-btn" id="article_img">上传图片</button>
                            <div class="layui-upload-list">
                                <img class="layui-upload-img" id="articles_imgs" />
                                <i class="layui-icon layui-icon-close-fill articles-img-delete layui-hide"></i>
                                <input type="hidden" value="" name="preview_photo" />
                                <p id="articlesImgText"></p>
                            </div>
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
                            <input type="radio" name="recommended" value="1" title="否" checked>
                            <input type="radio" name="recommended" value="2" title="是">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">上热门</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_hot" value="1" title="不上" checked>
                            <input type="radio" name="is_hot" value="2" title="上">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="formArticles">添加文章</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        //截取base64的值
        function getCaption(obj){
            var index = obj.lastIndexOf("\,");
            obj = obj.substring(index+1, obj.length);
            return obj;
        }

        layui.use(['form','table','layer', 'layedit', 'upload'], function () {
            var $ = layui.jquery
                , form = layui.form
                , table = layui.table
                , layer = layui.layer
                , layedit = layui.layedit
                , upload = layui.upload;
            form.render();

            //证明多图片上传
            var uploadListIns = upload.render({
                elem: '#article_img'
                // , url: '/component/upload/'
                , auto: false //选择文件后不自动上传
                // ,bindAction: '#testListAction' //指向一个按钮触发上传
                , size: 2048     //图片大小 单位kb
                , accept: 'images'
                , acceptMime: 'image/*'
                ,choose: function(obj){
                    //将每次选择的文件追加到文件队列
                    var files = obj.pushFile();

                    var img_src = $('#articles_imgs').attr('src');
                    console.log(typeof img_src);
                    if (typeof img_src === "string") {
                        var demoText = $('#articlesImgText');
                        demoText.html('<span style="color: #FF5722;">只能上传一张图片</span>');
                        return false;
                    }
                    //预读本地文件，如果是多文件，则会遍历。(不支持ie8/9)
                    obj.preview(function(index, file, result){
                        console.log(index); //得到文件索引
                        console.log(file); //得到文件对象
                        console.log(result); //得到文件base64编码，比如图片
                        var base64_img = getCaption(result);

                        $('#articles_imgs').attr('src', result); //图片链接（base64）
                        $('input[name="preview_photo"]').val(base64_img);
                        //删除
                        $('.articles-img-delete').removeClass('layui-hide');
                        $('.articles-img-delete').on('click', function(){
                            delete files[index]; //删除对应的文件
                            $('#articles_imgs').removeAttr('src');
                            $(this).addClass('layui-hide');
                            $('input[name="preview_photo"]').val('');
                            uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                        });
                    });
                },
                done:function (res, index, upload) {
                    console.log(res);
                },
                error: function(res, index, upload){
                    //请求异常回调
                    console.log(res, index, upload);
                }
            });

            //监听添加提交
            form.on('submit(formArticles)', function(data) {
                var datas = new Object();

                datas['_token'] = data.field._token;
                datas['title'] = data.field.title;
                datas['describe'] = data.field.describe;
                datas['content'] = data.field.content;
                datas['preview_photo'] = data.field.preview_photo;
                datas['is_hot'] = data.field.is_hot;
                datas['recommended'] = data.field.recommended;
                datas['uid'] = 1;

                var title_msg = ''; //弹窗提示语
                $.post('/admin/articles', datas, function (res,status) {
                    console.log(res);
                    if (res.code === 200){
                        title_msg = '添加标文章成功';
                    } else {
                        title_msg = '添加文章失败';
                    }
                    layer.msg(title_msg, {icon: 7, time: 3000, title: '媛飞工作室 -- 温馨提示'}, function (index) {
                        window.location.replace('/admin/articles');
                    });
                }, 'json').error(function(xhr,errorText,errorType){
                    var errors = xhr.responseJSON.errors;
                    console.log(xhr);
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
