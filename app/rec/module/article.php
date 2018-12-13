<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/4
 * Time: 16:59
 */
namespace rec\mod;

use \module;

class article extends module
{
    /**
     * 获得文章
     * @return mixed
     */
    public function get_article()
    {
//        $sql = "select * from `accounsts`";
//        $da  = $this->query($sql)->rowCount();
//        print_r($da);
        $as['title']   = 'php开篇';

        $as['article'] = 'php的开篇文，胖头陀励志做不一样的技术好文。
                    
                            一、为自己技术的长久提升。
                            
                            二、为大家解决开发中的实际问题。
                            
                            本人邮箱：369666182@qq.com';

        return $as;
    }

    /**
     * 获得文章列表
     * @return array
     */
    public function get_article_list($limits = '')
    {
        $as = array();

        $as[]['title']   = 'php开篇';
        $as[]['title']   = '222222';
        $as[]['title']   = '3333333';
        $as[]['title']   = '33333333';

        return $as;
    }

    /**
     * 获得文章分类
     * @return array
     */
    public function get_article_classify($article_id = '')
    {
        $as = array();

        $as[]['classify']   = 'php';
        $as[]['classify']   = 'redis';
        $as[]['classify']   = 'mysql';
        $as[]['classify']   = 'nginx';
        $as[]['classify']   = 'python';

        return $as;
    }
}