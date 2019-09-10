@extends('admin.layout.master')

@section('content')

    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li class="layui-this">文章管理</li>
            <li>添加文章</li>
        </ul>
        <div class="layui-tab-content">

            <div class="layui-tab-item layui-show">
                <table class="layui-table" lay-filter="articles_filter" id="articles_demo">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>作者</th>
                            <th>文章描述</th>
                            <th>文章预览图</th>
                            <th>文章是否属于热门</th>
                            <th>文章是否属于推荐</th>
                            <th>文章是否删除</th>
                            <th>文章阅读量</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{ $d['article_id'] }}</td>
                            <td>{{ $d['article_author'] }}</td>
                            <td>
                                <a class="" href="javascript:;">{{ mb_strlen($d['article_describe']) > 8 ? mb_substr($d['article_describe'], 0, 8).'...' : $d['article_describe'] }}</a>
                            </td>
                            <td><img src="data:image/png;base64,{{ ($d['preview_photo']) }}" alt=""></td>
                            <td>{{ $d['is_hot'] === 2 ? '热门': '非热门' }}</td>
                            <td>{{ $d['is_recommended'] === 2 ? '推荐': '非推荐' }}</td>
                            <td>{{ $d['is_delete'] === 2 ? '已删除' : '未删除' }}</td>
                            <td>{{ $d['reading_nums'] }}</td>
                            <td>{{ $d['created_at'] }}</td>
                            <td>
                                <div class="layui-btn-group" name_id="">
                                    <button class="layui-btn layui-btn-sm layui-btn-radius edit-tag" href="javascript:;" name=""><i class="layui-icon layui-icon-add-1"></i></button>
                                    <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-success edit-tag" href="javascript:;" name=""><i class="layui-icon layui-icon-edit"></i></button>
                                    <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal edit-tag" href="javascript:;" name=""><i class="layui-icon layui-icon-face-smile-fine"></i></button>
                                    <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-warm edit-tag" href="javascript:;" name=""><i class="layui-icon layui-icon-fire"></i></button>
                                    <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-danger del-tag" href="javascript:;"><i class="layui-icon layui-icon-delete"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="layui-tab-item">
                <div class="layui-form layui-form-pane">
                    {{ csrf_field() }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="article_title" lay-verify="required" placeholder="请输入文章标题" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">描述</label>
                        <div class="layui-input-block">
                            <input type="text" name="article_describe" lay-verify="required" placeholder="请输入文章描述" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">预览图</label>
                        <div class="layui-input-block">
                            <button type="button" class="layui-btn" id="article_img">上传图片</button>
                            <div class="layui-upload-list">
                                <img class="layui-upload-img" id="articles_imgs" />
                                <i class="layui-icon layui-icon-close-fill articles-img-delete layui-hide"></i>
                                <input type="hidden" value="" name="article_images" />
                                <p id="articlesImgText"></p>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">文章内容</label>
                        {{--<div class="layui-input-block">
                            <textarea class="layui-textarea" name="content" lay-verify="content" id="LAY_demo_editor"></textarea>
                        </div>--}}
                        <div class="layui-input-block">
                            <textarea id="demo" style="display: none;"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">推荐</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_recommended" value="1" title="否" checked>
                            <input type="radio" name="is_recommended" value="2" title="是">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">上热门</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_hot" value="1" title="不上" checked>
                            <input type="radio" name="is_hot" value="2" title="上">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="formArticles">添加文章</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/admin/articles/index.js') }}"></script>

@endsection
