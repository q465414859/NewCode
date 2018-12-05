<?php
/**
 * Created by PhpStorm.
 * User: Code
 * Date: 2018/12/3
 * Time: 20:05
 */
namespace rec\con;
use \controller;
use rec\mod\indexs;

class index extends controller
{
    function index()
    {
        return $this->get_view();
    }
}

