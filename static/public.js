/**
 * 设置文章内容
 * @param uri
 */
function get_article_title(uri,ids) {

    $.post(
        uri,
        {id:ids},
        function(result){
            var result = JSON.parse(result);
            $('#title').text(result['title']);
            $('#article').html(result['article']);
        }
    );
}