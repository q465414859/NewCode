<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/3
 * Time: 17:30
 */

$autoload = spl_autoload_register('autoloads',true);

if ($autoload === false && $for_error === true)
{
    throw new Exception("自动加载失败！");
}

unset($autoload);