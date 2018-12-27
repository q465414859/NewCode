<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/18
 * Time: 20:56
 */

namespace rec\con;
use \controller;
use rec\mod\article as rma;

/**
 * 文章详情入口类
 * Class article
 * @package rec\con
 */
class article extends controller
{
    /**
     * 文章详情入口类
     * @return bool|string
     * @throws \Exception
     */
    public function index()
    {
        return $this->get_view();//调用视图
    }

    /**
     * 获得文章内容
     * @return string
     */
    function get_article()
    {
        $id = $_POST['id'];
        $data = (new rma())->get_article($id);
        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    /**
     * 获得文章列表
     * @return string
     */
    function get_article_list()
    {
        $limit = $_POST['limit']?:1;
        $data = (new rma())->get_article_list($limit);  //获得文章列表
        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    /**
     * 获得文章分类
     * @return string
     */
    function get_article_classify()
    {
        $limit = $_POST['limit'];
        $data = (new rma())->get_article_classify($limit);  //获得文章分类
        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }
}