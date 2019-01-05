$(function(){
    get_article_list(10);//获得文章列表数据
});

/**
 * 设置文章列表
 */
function set_article_list_view(result) {

    console.log(result);

    var html = '<div>';

    for (var i in result)
    {
        html += '<div><a href="/bac/index/article?id='+result[i]['id']+'">标题'+result[i]['head']+'</a></div>';
        html += '<div>内容'+result[i]['text']+'</div>';
        html += '<div>分类'+result[i]['class']+'</div>';
    }

    html += '</div>';

    $('#list').html(html);

}