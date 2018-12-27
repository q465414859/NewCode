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
    function get_article_list()
    {
        $limit = $_POST['limit']?:1;
        $data = (new article)->get_full_article_class(2);
        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }
}