<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/3
 * Time: 17:22
 */

define("PATH_INFO",$_GET['s']);
define("ROOT",$_SERVER['DOCUMENT_ROOT']);
define("ONE_MINUTE",60);                    //一分钟
define("ONE_HOUR",MINUTE1*60);              //一小时
define("ONE_DAY",ONE_HOUR*24);              //一天

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
    'name'=>'blogs',
];
$view_replace = [            //视图替换配置
    '__ROOT__'=>'http://d2.com'
];