<?php
/**
 * Created by PhpStorm.
 * User: Code
 * Date: 2018/12/4
 * Time: 16:59
 */
namespace rec\mod;

use \module;

class indexs extends module
{
    public function index()
    {
        $sql = "select * from `accounsts`";
        $da  = $this->query($sql)->rowCount();
        print_r($da);
    }
}