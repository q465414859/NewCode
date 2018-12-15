<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/3
 * Time: 17:06
 */

session_start();
include_once './constants.php'; //配置参数
include_once './functions.php'; //公共方法
include_once './autoloads.php'; //自动加载

(new rec\mod\visit_log())->visit_log();//访问者添加LOG

go_index();//入口