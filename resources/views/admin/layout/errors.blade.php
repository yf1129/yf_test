{{--错误提示--}}
@if (count($errors) > 0)

    <input type="hidden" id="msg_modify_data" value="{{ $errors }}">

    <script>
        layui.use( 'layer', function(){
            var $ = layui.jquery
                , layer = layui.layer;

            var msg_modify = $('#msg_modify_data').val();
            msg_modify = JSON.parse(msg_modify);
            //触发事件
            layer.msg(msg_modify['original_password'][0], {icon: 7, time: 3000}); //3s后自动关闭
        });
    </script>

@endif

{{--密码修改提示--}}
@if(session('modify_msg'))

    <input type="hidden" id="return_msg" value="{{ session('modify_msg') }}">
    {{  Auth::guard('admin')->logout() }}
    <script>
        layui.use( 'layer', function() {
            var $ = layui.jquery
                , layer = layui.layer;

            var return_msg = $('#return_msg').val();
            layer.alert(return_msg, {icon: 7, title: '媛飞工作室 -- 温馨提示'}, function (index) {
                window.location.replace('/admin/login');
            });
        });
    </script>

@endif