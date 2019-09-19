layui.use('flow', function(){
    var $ = layui.jquery,
        flow = layui.flow;

    var GloadUrl = window.location.protocol + "//" + window.location.host;

    flow.load({
        elem: '#article_demo' //流加载容器
        ,scrollElem: '#article_demo'
        ,isAuto: false
        ,isLazyimg: true
        ,done: function(page, next){ //加载下一页
            //模拟插入
            setTimeout(function(){
                var lis = [];
                $.get('/api/articleList?page=' + page, function (res, status) {
                    if (res.code === 200) {
                        var data = res.message.data;
                        var total_num = res.message.total_num;
                        var total_page = res.message.total_page;

                        $.each(data, function(index, item){
                            var imgUrl = '';
                            if (item["article_images"] === null) {
                                imgUrl = GloadUrl + "/img/default/default_article.jpg";
                            } else {
                                imgUrl = "data:image/png;base64," + item["article_images"];
                            }

                            lis.push('<div class="waterfall-imgbox waterfall-box"><a href="#"><img src="'+ imgUrl +'" alt="#"></a><div class="waterfall-collect"><i class="title"></i><div class="info"><h4><a href="#">【' + item["article_author"] + '|' + item["article_title"].substr(0, 6) + '...】</h4><p><span>' + item['reading_nums'] + ' 阅读量</span><span>119 粉丝</span></p></div></div>' +( (page-1)*10 + index + 1 )+ '</div>');
                        });

                        next(lis.join(''), page < total_page);
                    }

                });
            }, 500);
        }
    });
});