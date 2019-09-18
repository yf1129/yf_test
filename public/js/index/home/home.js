layui.use('flow', function(){
    var $ = layui.jquery,
        flow = layui.flow;

    flow.load({
        elem: '#article_demo' //流加载容器
        ,scrollElem: '#article_demo'
        ,isAuto: false
        ,isLazyimg: true
        ,done: function(page, next){ //加载下一页
            //模拟插入
            setTimeout(function(){
                var lis = [];
                $.get('/api/articleList/10', function (res, status) {
                    console.log(res);
                    if (res.code === 200) {
                        var data = res.message.data;
                        var total_num = res.total_num;
                        var total_page = res.total_page;
console.log(data[0]["article_images"])

                        layui.each(data, function(index, item){
                            lis.push('<div class="main-waterfall__row clearfix"><div class="waterfall-imgbox waterfall-box"><a href="#"><img src="' +data[i]["article_images"]+ '" alt="#"></a></div><div class="waterfall-box"><div class="waterfall-info waterfall-info__top"><i class="title"></i><h3>' +data[i]["article_title"]+ '</h3><p><span>45 阅读量</span><span>119 粉丝</span></p><span>来自：' +data[i]["article_author"]+ '</span><i class="info-arrow info-arrow__left"></i>' +( (page-1)*8 + i + 1 )+ '</div>');
                        });
                        /*for(var i = 0; i < total_num; i++){
                            console.log(data.i);
                            // lis.push('<li><img lay-src="//s17.mogucdn.com/p2/161011/upload_279h87jbc9l0hkl54djjjh42dc7i1_800x480.jpg?v='+ ( (page-1)*6 + i + 1 ) +'"></li>')
                            lis.push('<div class="main-waterfall__row clearfix"><div class="waterfall-imgbox waterfall-box"><a href="#"><img src="' +data[i]["article_images"]+ '" alt="#"></a></div><div class="waterfall-box"><div class="waterfall-info waterfall-info__top"><i class="title"></i><h3>' +data[i]["article_title"]+ '</h3><p><span>45 阅读量</span><span>119 粉丝</span></p><span>来自：' +data[i]["article_author"]+ '</span><i class="info-arrow info-arrow__left"></i>' +( (page-1)*8 + i + 1 )+ '</div>')
                        }*/
                        next(lis.join(''), page < total_page);
                    }

                });
            }, 500);
        }
    });
});