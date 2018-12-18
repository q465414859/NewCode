<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * data: 2018/12/3
 * Time: 20:05
 */
namespace rec\con;
use \controller;
use \module;
use rec\mod\article;

/**
 * 客户端首页入口类
 * Class index
 * @package rec\con
 */
class index extends controller
{
    /**
     * 客户端首页入口
     * @return bool|string
     * @throws \Exception
     */
    function index()
    {
        return $this->get_view();//调用视图
    }

    /**
     * 客户端首页数据
     * @return bool|string
     * @throws \Exception
     */
    function index_data()
    {
        $article                = new article();                      //文章类
        $get_article            = $article->get_article();            //文章内容
        $get_article_list       = $article->get_article_list();       //文章列表
        $get_article_classify   = $article->get_article_classify();   //文章分类

        $data['get_article']           = $get_article;
        $data['get_article_list']      = $get_article_list;
        $data['get_article_classify']  = $get_article_classify;

        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }

}

