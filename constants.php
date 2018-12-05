<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/3
 * Time: 17:22
 */

define("PATH_INFO",$_SERVER['PATH_INFO']);
define("ROOT",$_SERVER['DOCUMENT_ROOT']);

$for_error  = true;          //开启报错
$tiem_index = 'rec';         //默认端
$con_index  = 'index';       //默认控制器
$fun_index  = 'index';       //默认方法
$redis      = '';            //存储redis对象
$redis_ip   = "127.0.0.1";   //redis链接IP
$redis_port = 6379;          //redis端口
$db_host = [                 //数据库连接
    'host'=>'127.0.0.1',
    'user'=>'root',
    'pass'=>'q3619940',
    'name'=>'performance_schema',
];