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
                {!! Form::text('tellphone', null, ['placeholder' => '请输入您的用户名/手机号']) !!}
                <div class="login-center-input-text">用户名</div>
            </div>
        </div>
        <div class="login-center clearfix">
            <div class="login-center-img"><img src="{{ asset('img/admin/password.png') }}"/></div>
            <div class="login-center-input">
                {{--<input type="password" name="password" value="" placeholder="请输入您的密码" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的密码'"/>--}}
                {!! Form::password('password', ['placeholder' => '请输入您的密码', 'onfocus' => "this.placeholder=''", 'onblur' => "this.placeholder='请输入您的密码'", 'autocomplete' => 'off']) !!}
                <div class="login-center-input-text">密码</div>
            </div>
        </div>
        {!! Form::submit('登 陆', ['class' => 'login-button']) !!}
        {{--<button type="submit" class="login-button">登 陆</button>--}}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
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

</body>
</html>
