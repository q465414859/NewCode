<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/3
 * Time: 20:13
 */
namespace bac\con;

/**
 * 后台入口
 * Class index
 * @package bac\con
 */
class index extends admin
{
    /**
     * 后台主页面
     * @return bool|string
     * @throws \Exception
     */
    function index()
    {
        return $this->get_view(); //获得视图
    }

}