<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/4
 * Time: 16:59
 */
namespace rec\mod;

use \module;

/**
 * 文章模型类
 * Class article
 * @package rec\mod
 */
class article extends module
{
    /**
     * 获得文章内容
     * @param $id   文章ID
     * @return mixed
     */
    public function get_article($id)
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
     * 获得文章列表（含分类）
     * @return array
     */
    public function get_article_list($limit = 1)
    {
        $sql = "select * from `article` limit {$limit}";
        $data = $this->query($sql)->fetchAll();

        foreach ($data as $k => $v)
        {
            $class = implode(',',$this->get_full_article_class($v['class_id']));

            $data[$k]['class'] = $class;
        }
        return $data;
    }

    /**
     * 获得完整文章分类（包括上级分类）
     * 例：["PHP","PHP基础"]
     * @param $id           分类ID
     * @param array $str
     * @return array
     * @throws \Exception
     */
    public function get_full_article_class($id,$str = array())
    {
        $arr = array(':id' => $id);
        $sql = 'select `name`,`pid` from `article_class` where `id` = :id';
        $data = $this->query($sql,$arr)->fetchAll();    //获得文章分类数据

        array_unshift($str,$data[0]['name']);   //从数组头部插入

        if ($data[0]['pid'])    //有上级场景
        {
            return $this->get_full_article_class($data[0]['pid'],$str); //如果有上级ID后迭代获取
        }else{
            return $str;
        }
    }

    /**
     * 获得文章分类
     * @return array
     */
    public function get_article_classify($limit = 1)
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