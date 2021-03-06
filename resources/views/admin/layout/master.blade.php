<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>媛飞 -- 后台管理</title>
    <meta name="description" content="login">
    <meta name="author" content="YF" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-4.0.0/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('lib/layui/css/layui.css') }}">
    <script src="{{ asset('lib/layui/layui.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>

</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">媛飞工作室</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item layui-nav-itemed"><a href="/admin/index">控制台</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item"><a href="">关于我</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    @if(empty(Auth::guard('admin')->user()))
                        @redirect('admin/login')
                        <input type="hidden" id="admin_name_msg" value="{{ Auth::guard('admin')->user() }}">
{{--                        {{ dd(empty(Auth::guard('admin')->user()))   view('admin/login') }}--}}
                    @else
                        <input type="hidden" id="admin_name_msg" value="{{ Auth::guard('admin')->user()->admin_name }}">
                        {{ Auth::guard('admin')->user()->admin_name }}
                    @endif
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="/admin/basic">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                    <dd><a href="/admin/modifypwd">修改密码</a></dd>
                    <dd><a href="/admin/logout">退出</a></dd>
                </dl>
            </li>
{{--            <li class="layui-nav-item"><a href="">退出</a></li>--}}
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">管理员管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="operate">管理员列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">用户列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">文章管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="articles">文章列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">内容等管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">列表一</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="javascript:;">列表三</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">系统管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">校时</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">关于我</a></li>
                <li class="layui-nav-item"><a href="">联系我</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            @yield('content')
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © yf.com {{ date('Y-m-d H:i:s') }} - 底部固定区域
    </div>
</div>

</body>

@include('admin.layout.errors')

</html>