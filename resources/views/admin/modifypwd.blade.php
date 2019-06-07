@extends('admin.layout.master')

@section('content')

    <fieldset class="layui-elem-field layui-field-title">
        <legend>管理员密码修改</legend>
    </fieldset>
    <form class="layui-form layui-form-pane" action="/admin/modifypwd" method="post">
        {{ csrf_field() }}

        <div class="layui-form-item">
            <label class="layui-form-label">原密码</label>
            <div class="layui-input-inline">
                <input type="text" name="original_password" lay-reqText="原密码不能为空" lay-verify="required" placeholder="请输入原密码" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">新密码</label>
            <div class="layui-input-inline">
                <input id="modify_pwd" type="password" name="password" lay-reqText="新密码不能为空" lay-verify="required|alpha_num" placeholder="请输入新密码" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">请务必填写用户名</div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">新二次密码</label>
            <div class="layui-input-inline">
                <input type="password" name="password_confirmation" lay-reqText="二次新密码不能为空" lay-verify="required|alpha_num|confirmed" placeholder="请输入二次新密码" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">请务必填写用户名</div>
        </div>

        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="modifyPwd" type="submit">修 改</button>
        </div>
    </form>

@endsection
