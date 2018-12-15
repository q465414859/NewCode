<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/3
 * Time: 17:06
 */

session_start();
include_once './constants.php';
include_once './functions.php';
include_once './autoloads.php';

(new rec\mod\visit_log())->visit_log();//访问者添加LOG

try{
    go_index();
}catch (Exception $e) {
    echo $e->getMessage();
}