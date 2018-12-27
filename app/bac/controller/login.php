<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/26
 * Time: 20:15
 */

namespace bac\con;

use \controller;
use bac\mod\user;

/**
 * 登陆页
 * Class login
 * @package bac\con
 */
class login extends controller
{
    /**
     * 登陆页
     * @return bool|string
     * @throws \Exception
     */
    function login()
    {
        return $this->get_view(); //获得视图
    }

    /**
     * 检验登陆
     */
    function checkout()
    {
        /**
         * 检验登陆代码
         */
        $user     = $_POST['user'];
        $password = md5($_POST['password']);

        $code = '';         //返回的Code码
        $data = array();    //返回数据
        $url  = '';         //跳转URL

        $users = new user();

        $user_data = $users->get_user($user);       //获得user数据

        if ($user_data)                             //用户存在时
        {
            if ($user_data['password'] != $password)//用户密码不正确场景
            {
                $code = '密码不正确！';
                $url  = '/bac/login/login';

            }else{                                  //登陆成功

                setcookie("user",$user,ONE_DAY,'/');        //记录帐号cookie
                setcookie("password",$password,ONE_DAY,'/');//记录密码cookie
                setcookie("id",$user_data['id'],ONE_DAY,'/');//记录ID

                $code = '登陆成功！';
                $url  = '/bac/index/index';
            }
        }else{                                      //用户不存在
            $code = '用户不存在！';
            $url  = '/bac/login/login';
        }

        return ajax_return($code,$data,$url);
    }
}














