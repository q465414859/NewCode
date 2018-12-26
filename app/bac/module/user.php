<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/26
 * Time: 19:44
 */

namespace bac\mod;

use \module;

/**
 * 用户类
 * Class user
 * @package bec\mod
 */
class user extends module
{
    /**
     * 以用户名获得用户数据
     * @param $user
     * @return mixed
     * @throws \Exception
     */
    public function get_user($user)
    {
        $arr = array(':user' => $user);

        $sql = "select * from `user` where `user` = :user";
        $data = $this->query($sql,$arr)->fetchAll();    //获得用户所有数据
        return $data[0];
    }
}