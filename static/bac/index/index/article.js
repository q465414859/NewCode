$(function(){
    var id = gain_get('id');//获得get参数
    get_article(id);//获得文章
});

/**
 * 设置文章页
 * @param result
 */
function set_article_view(result){

    var head = result[0].head;
    var text = result[0].text;

    $('#head').html(head);
    $('#text').html(text);
}