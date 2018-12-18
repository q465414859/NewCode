/**
 * 获得GET
 * @param name
 * @returns {*}
 * @constructor
 */
function GetQueryString(name)
{
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if(r!=null)return  unescape(r[2]); return null;
}

/**
 * 设置文章内容
 * @param uri
 */
function get_article(ids) {

    $.post(
        '/rec/article/get_article',
        {id:ids},
        function(result){
            var result = JSON.parse(result);
            $('#title').html(result['title']);
            $('#article').html(result['article']);
        }
    );
}

/**
 * 设置文章列表
 * @param limits
 */
function get_article_list(limits) {

    $.post(
        '/rec/article/get_article_list',
        {limit:limits},
        function(result){
            var result = JSON.parse(result);
            var s = '';
            for (var index in result){
                s += '<div>'+result[index]['title']+'</div>';
            }
            $('#recent').html(s);
        }
    );
}

/**
 * 设置文章分类
 * @param article_id
 */
function get_article_classify(classifys) {
    $.post(
        '/rec/article/get_article_classify',
        {classify:classifys},
        function(result){
            var result = JSON.parse(result);
            console.log(result);

            var s = '';
            for (var index in result){
                s += '<div>'+result[index]['classify']+'</div>';
            }
            $('#classify').html(s);
        }
    );
}