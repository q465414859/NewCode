$(function () {
    var id = gain_get('id');//获得id GET参数
    get_article(id);//获得id的文章
});

function set_article_view(result)
{
    var head = result[0].head;
    var text = result[0].text;

    $('#head').html(head);
    $('#text').html(text);
}
