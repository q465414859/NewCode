<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/13
 * Time: 23:19
 */

namespace rec\mod;
use module;

/**
 * 访问者类
 * Class visit_log
 * @package rec\mod
 */
class visit_log extends module
{
    public function visit_log()
    {
        $arr[':ip']          = $_SERVER['REMOTE_ADDR'];         //IP
        $arr[':course_id']   = getmypid();                      //进程号
        $arr[':session_id']  = session_id();                    //SESSIONID
        $arr[':time']        = $_SERVER['REQUEST_TIME'];        //请求时间
        $arr[':operation']   = PATH_INFO;                       //访问动作
        $arr[':get']         = json_decode($_GET,1);      //GET参数
        $arr[':post']        = json_decode($_POST,1);     //POST参数
        $arr[':http_user_agent'] = $_SERVER['HTTP_USER_AGENT']; //客户端信息

        $sql = "insert into `visit_log`(`ip`,`session_id`,`course_id`,`time`,`operation`,`get`,`post`,`http_user_agent`) 
                  values (:ip,:session_id,:course_id,:time,:operation,:get,:post,:http_user_agent)";
        $this->query($sql,$arr);
    }
}