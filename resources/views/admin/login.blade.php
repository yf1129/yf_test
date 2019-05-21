<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>后台登录 --媛飞工作室</title>
    <meta name="description" content="login">
    <meta name="author" content="YF" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    {{-- css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-4.0.0/css/bootstrap.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/reset.css') }}"/>
</head>
<body>

<div id="particles-js">

    {!! Form::open() !!}

        <div class="login">
            <div class="login-top">登录</div>
            <div class="login-center clearfix">
                <div class="login-center-img"><img src="{{ asset('img/admin/name.png') }}"/></div>
                <div class="login-center-input">
                    {{--<input type="text" name="tellphone" value="" placeholder="请输入您的用户名/手机号" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的用户名/手机号'"/>--}}
                    {!! Form::text('tellphone', null, ['placeholder' => '请输入您的用户名/手机号', 'onfocus' => "this.placeholder=''", 'onblur' => "this.placeholder='请输入您的用户名/手机号'"]) !!}
                    <div class="login-center-input-text">用户名</div>
                </div>
            </div>
            <div class="login-center clearfix">
                <div class="login-center-img"><img src="{{ asset('img/admin/password.png') }}"/></div>
                <div class="login-center-input">
                    {{--<input type="password" name="password" value="" placeholder="请输入您的密码" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的密码'"/>--}}
                    {!! Form::password('password', ['placeholder' => '请输入您的密码', 'onfocus' => "this.placeholder=''", 'onblur' => "this.placeholder='请输入您的密码'"]) !!}
                    <div class="login-center-input-text">密码</div>
                </div>
            </div>
            {!! Form::submit('登 陆', ['class' => 'login-button']) !!}
            {{--<button type="submit" class="login-button">登 陆</button>--}}

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>

    {!! Form::close() !!}

    <div class="sk-rotating-plane"></div>
</div>

<!-- scripts -->
<script src="{{ asset('lib/jQuery/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap-4.0.0/js/bootstrap.js') }}"></script>
<script src="{{ asset('js/admin/particles.min.js') }}"></script>
<script src="{{ asset('js/admin/app.js') }}"></script>
{{--<script type="text/javascript">
    function hasClass(elem, cls) {
        cls = cls || '';
        if (cls.replace(/\s/g, '').length == 0) return false; //当cls没有参数时，返回false
        return new RegExp(' ' + cls + ' ').test(' ' + elem.className + ' ');
    }

    function addClass(ele, cls) {
        if (!hasClass(ele, cls)) {
            ele.className = ele.className == '' ? cls : ele.className + ' ' + cls;
        }
    }

    function removeClass(ele, cls) {
        if (hasClass(ele, cls)) {
            var newClass = ' ' + ele.className.replace(/[\t\r\n]/g, '') + ' ';
            while (newClass.indexOf(' ' + cls + ' ') >= 0) {
                newClass = newClass.replace(' ' + cls + ' ', ' ');
            }
            ele.className = newClass.replace(/^\s+|\s+$/g, '');
        }
    }
    document.querySelector(".login-button").onclick = function(){
        addClass(document.querySelector(".login"), "active")
        setTimeout(function(){
            addClass(document.querySelector(".sk-rotating-plane"), "active")
            document.querySelector(".login").style.display = "none"
        },800)
        setTimeout(function(){
            removeClass(document.querySelector(".login"), "active")
            removeClass(document.querySelector(".sk-rotating-plane"), "active")
            document.querySelector(".login").style.display = "block"
            alert("登录成功")

        },5000)
    }
</script>--}}
</body>
</html>
