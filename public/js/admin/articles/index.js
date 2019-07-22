//截取base64的值
function getCaption(obj){
    var index = obj.lastIndexOf("\,");
    obj = obj.substring(index+1, obj.length);
    return obj;
}

// 对Date的扩展，将 Date 转化为指定格式的String
// 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符，
// 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字)
// 例子：
// (new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423
// (new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18
Date.prototype.Format = function (fmt) {
    var o = {
        "M+": this.getMonth() + 1, //月份
        "d+": this.getDate(), //日
        "H+": this.getHours(), //小时
        "m+": this.getMinutes(), //分
        "s+": this.getSeconds(), //秒
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度
        "S": this.getMilliseconds() //毫秒
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
};

layui.use(['form','table','layer', 'layedit', 'upload'], function () {
    var $ = layui.jquery
        , form = layui.form
        , table = layui.table
        , layer = layui.layer
        , layedit = layui.layedit
        , upload = layui.upload;
    form.render();

    layedit.set({
        uploadImage: { url: '/apii/user/opupload' }
    });
    var index = layedit.build('demo', {
        height: '600px',
        tool: [
            'strong' //加粗
            ,'italic' //斜体
            ,'underline' //下划线
            ,'del' //删除线
            ,'|' //分割线
            ,'left' //左对齐
            ,'center' //居中对齐
            ,'right' //右对齐
            ,'|' //分割线
            ,'link' //超链接
            ,'unlink' //清除链接
            ,'face' //表情
        ]
    }); //建立编辑器

    var content = layedit.getContent(index);
    console.log(content);

    //证明多图片上传
    var uploadListIns = upload.render({
        elem: '#article_img'
        // , url: '/component/upload/'
        , auto: false //选择文件后不自动上传
        // ,bindAction: '#testListAction' //指向一个按钮触发上传
        , size: 2048     //图片大小 单位kb
        , accept: 'image'
        , acceptMime: 'image/*'
        , exts: 'jpg|png|gif|bmp|jpeg'
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
        datas['description'] = data.field.description;
        datas['content'] = data.field.content;
        datas['preview_photo'] = data.field.preview_photo;
        datas['is_hot'] = data.field.is_hot;
        datas['is_recommended'] = data.field.is_recommended;
        datas['is_delete'] = 1;
        datas['created_at'] = new Date().Format("yyyy-MM-dd HH:mm:ss");
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