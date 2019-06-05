@extends('admin.layout.master')

@section('content')

    <fieldset class="layui-elem-field layui-field-title">
        <legend>管理员密码修改</legend>
    </fieldset>
    <form class="layui-form" action="/admin/modifypwd" method="post">
        {{ csrf_field() }}
        {{ $errors }}
        <div class="layui-form-item">
            <label class="layui-form-label">原密码</label>
            <div class="layui-input-inline">
                <input type="text" name="original_password" lay-verify="" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">新密码</label>
            <div class="layui-input-inline">
                <input type="password" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">请务必填写用户名</div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">新二次密码</label>
            <div class="layui-input-inline">
                <input type="password" name="comfirm_password" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">请务必填写用户名</div>
        </div>

        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="modifyPwd">修 改</button>
        </div>
    </form>

{{--    <script>--}}
{{--        layui.use(['element', 'layer', 'form'], function() {--}}
{{--            var $ = layui.jquery--}}
{{--                , element = layui.element--}}
{{--                , layer = layui.layer--}}
{{--                , form = layui.form;--}}


{{--        });--}}
{{--    </script>--}}
@endsection
