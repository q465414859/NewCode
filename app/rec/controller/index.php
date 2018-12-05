<?php
/**
 * Created by PhpStorm.
 * User: Code
 * Date: 2018/12/3
 * Time: 20:05
 */
namespace rec\con;
use \controller;
use \module;
use rec\mod\indexs;

class index extends controller
{
    function index()
    {
        $sa = new indexs();
        echo "<pre>";
        print_r($sa->index());
        //return $this->get_view();
    }
}

