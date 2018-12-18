$(function(){
    index_data();
});


/**
 * 获得客户端首页
 */
function index_data(ids,limits,classifys) {
    $.post(
        '/rec/index/index_data',
        {id:ids,limit:limits,classify:classifys},
        function(result){
            var result = JSON.parse(result);

            console.log(result);

            var s = '';
            var m = '';

            //文章列表
            for (var i in result['get_article_list']){
                s += '<div>'+result['get_article_list'][i]['title']+'</div>';
            }

            //文章分类
            for (var i in result['get_article_classify']){
                m += '<div>'+result['get_article_classify'][i]['classify']+'</div>';
            }

            //文章内容
            $('#title').html('<a href="/rec/article/index?id=1">'+result['get_article']['title']+'</a>');
            $('#article').html(result['get_article']['article']);

            $('#recent').html(s);
            $('#classify').html(m);
        }
    );
}