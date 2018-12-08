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
//        $sql = "select * from `accounsts`";
//        $da  = $this->query($sql)->rowCount();
//        print_r($da);
        $as['title']   = 'php开篇';

        $as['article'] = 'php的开篇文，胖头陀励志做不一样的技术好文。
                    
                            一、为自己技术的长久提升。
                            
                            二、为大家解决开发中的实际问题。
                            
                            本人邮箱：369666182@qq.com';

        return $as;
    }
}