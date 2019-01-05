<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/26
 * Time: 20:25
 */

namespace bac\con;

use \controller;
use rec\mod\article;

/**
 * 入口控制器接口
 * Class index_port
 * @package bac\con
 */
class index_port extends controller
{
    /**
     * 获得文章列表数据
     * @return string
     */
    function get_article_list()
    {
        $limit = $_POST['limit']?:10;
        $data = (new article)->get_article_list($limit);
        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }
}