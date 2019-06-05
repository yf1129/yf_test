@if (count($errors) > 0)

    <input type="hidden" id="msg_modify" value="{{ $errors }}">

    <script>
        layui.use( 'layer', function(){
            var $ = layui.jquery
                , layer = layui.layer;

            var msg_modify = $('#msg_modify').val();
            msg_modify = JSON.parse(msg_modify);
            //触发事件
            layer.msg(msg_modify['original_password'][0], {icon: 7, time: 3000}); //3s后自动关闭
        });
    </script>

@endif