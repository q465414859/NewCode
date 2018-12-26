<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/26
 * Time: 19:51
 */

namespace bac\con;

use \controller;
use bac\mod\user;

/**
 * 后台公共
 * Class verification_login
 * @package bac\con
 */
class admin extends controller
{
    public function _initialize()
    {
        $this->detection_login();//检测登陆
    }

    /**
     * 检测登陆状态
     */
    private function detection_login()
    {
        $id         = $_COOKIE['id'];
        $user       = $_COOKIE['user'];
        $password   = $_COOKIE['password'];

        if (!empty($user))
        {
            $user = new user();
            $user_data = $user->get_user($user);

            if ($user_data['password'] != $password)
            {
                echo "<script>alert('密码错误！')</script>";
                headers('/bac/login/login',true);   //跳转到登录页
            }

        }else{
            headers('/bac/login/login',true);   //跳转到登录页
        }
    }
}