@if (count($errors) > 0)

    <div class="site-demo-button" id="layerErrors" style="margin-bottom: 0;">
        <button data-method="confirmTrans" class="layui-btn">配置一个透明的询问框</button>
    </div>

    <script>
        layui.use( 'layer', function(){
            var $ = layui.jquery
                , layer = layui.layer;

            //触发事件
            var active = {
                confirmTrans: function(){
                    //配置一个透明的询问框
                    var html = "@foreach ($errors->all() as $error) {{ $error }} @endforeach";
                    layer.msg(html, {
                        time: 2000, //20s后自动关闭
                        btn: ['明白了', '知道了', '哦']
                    });
                }
            }
            // $('#layerErrors .layui-btn').on('click', function(){
                var othis = $(this), method = othis.data('method');
                active[method] ? active[method].call(this, othis) : '';
            // });
        });
    </script>

@endif