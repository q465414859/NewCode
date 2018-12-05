<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/4
 * Time: 16:46
 */


class controller
{
    /**
     * 获得视图
     * 视图文件会被redis缓存，在视图修改后更新缓存
     * @param string $view
     * @return bool|string
     * @throws Exception
     */
    protected function get_view($view = '')
    {
        global $redis;
        $fun = FUN;
        $con = CON;
        $tiem= TIEM;

        if (is_string($view))
        {
            if ($view !== '')
            {
                $v = explode('/',$view);
                switch (count($v))
                {
                    case 1:
                        $fun = $v[0];
                        break;
                    case 2:
                        $fun = $v[1];
                        $con = $v[0];
                        break;
                    case 3:
                        $fun = $v[2];
                        $con = $v[1];
                        $tiem= $v[0];
                        break;
                    default:
                        throw new Exception('参数$view转义错误!');
                }
            }
        }else{
            throw new Exception('参数$view要求类型为string!');
        }

        $f = './app/'.$tiem.'/view/'.$con.'/'.$fun.'.html';

        if (file_exists($f) === true)
        {
            $fk = $tiem.'/'.$con.'/'.$fun;
            $d  = $redis->hGetAll($fk);                 //获得视图缓存
            $ft = filemtime($f);                        //获得视图文件最近修改时间
            if (!$d || $d['filectime'] <= $ft)          //视图缓存不存在或修改时间大于缓存时间，进入场景
            {
                $fg = file_get_contents($f);            //获得视图文件内容
                $redis->hSet($fk, 'file', $fg);         //存储视图缓存
                $redis->hSet($fk, 'filectime', time()); //存储视图缓存时间
            }else{
                $fg = $d['file'];
            }
            return $fg;
        }else{
            throw new Exception("视图{$f}不存在!");
        }
    }
}