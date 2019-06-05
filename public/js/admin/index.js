//JavaScript代码区域
layui.use(['element', 'carousel', 'util', 'laydate', 'layer', 'form', 'layedit'], function(){
    var $ = layui.jquery
        , element = layui.element
        , carousel = layui.carousel
        , util = layui.util
        , laydate = layui.laydate
        , layer = layui.layer
        , layedit = layui.layedit
        , form = layui.form;

    //建造实例
    carousel.render({
        elem: '#test1'
        ,width: '100%' //设置容器宽度
        ,arrow: 'always' //始终显示箭头
        //,anim: 'updown' //切换动画方式
    });

    //倒计时
    var thisTimer, setCountdown = function(y, M, d, H, m, s){
        var endTime = new Date(y, M||0, d||1, H||0, m||0, s||0) //结束日期
            ,serverTime = new Date(); //假设为当前服务器时间，这里采用的是本地时间，实际使用一般是取服务端的

        clearTimeout(thisTimer);
        util.countdown(endTime, serverTime, function(date, serverTime, timer){
            var str = '考研倒计时：' + date[0] + '天' + date[1] + '时' +  date[2] + '分' + date[3] + '秒';
            lay('#test2').html(str);
            thisTimer = timer;
        });
    };
    setCountdown(2019,12,21,0,0,0);

    //修改密码表单提交
    //自定义验证规则
    form.verify({
        alpha_num: function (value, item) {
            if (!new RegExp("^[A-Za-z0-9]+$").test(value)) {
                return '新密码必须是字母或数字';
            }
        },
        confirmed: function (value, item) {
            if (value !== $('#modify_pwd').val()) {
                return '两次密码不一致！';
            }
        }
    });
    //监听提交
    /*form.on('submit(modifyPwd)', function(data){
        var datas = (data.field);
        /!*$.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/admin/modifypwd',
            data: datas,
            dataType: 'json',
            async: false,
            cache: false,
            success: function (data) {
                console.log((data));
            },
            error: function (e) {
                console.log((e));
                var errors = e.responseJSON.errors;var html = '';
                var html = '';
                //配置一个透明的询问框
                $.each(errors, function (index) {
                    html += errors[index][0] + "<br/>";
                });

                layer.msg(html, {icon: 7, time: 3000});//3s后自动关闭

            }
        });*!/

        $.ajaxSettings.async = false;
        $.post('/admin/modifypwd', datas, function (res, status) {
            console.log((status));
        }, 'json').error(function(xhr,errorText,errorType){
            var errors = xhr.responseJSON.errors;
            console.log(errors);
            var html = '';
            //配置一个透明的询问框
            $.each(errors, function (index) {
                html += errors[index][0] + "<br/>";
            });

            layer.msg(html, {icon: 7, time: 3000});//3s后自动关闭
        });
        layer.msg(html, {icon: 7, time: 3000});//3s后自动关闭
        // return false;
        $.ajaxSettings.async = true;
    });*/

});
