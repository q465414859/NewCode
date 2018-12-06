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
     * 自动拼接head，foot视图
     * @param string $view
     *  视图命名空间
     *  1）端/模块/方法
     *      rec/index/index
     *      默认为调用方法的视图
     *  2）模块/方法
     *      index/index
     *  3）方法
     *      index
     * @return bool|string
     * @throws Exception
     */
    protected function get_view($view = '')
    {
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

        $f  = './app/'.$tiem.'/view/'.$con.'/'.$fun.'.html';
        $fk = $tiem.'/'.$con.'/'.$fun;
        $bd = $this->return_view($f,$fk);                       //获得body视图

        $f  = './static/head.html';
        $fk = 'head';
        $hd = $this->return_view($f,$fk);                       //获得head视图

        $f  = './static/foot.html';
        $fk = 'foot';
        $fd = $this->return_view($f,$fk);                       //获得foot视图

        $fg = $hd.$bd.$fd;

        return $fg;
    }

    /**
     * 返回视图数据
     * 视图文件会被redis缓存，在视图修改后更新缓存
     * @param $dir          文件地址
     * @param $space        redis存储、获取的key(一般为“端/模块/方法”)
     * @return bool|string
     * @throws Exception
     */
    private function return_view($dir,$space)
    {
        global $redis;
        if (file_exists($dir) === true)
        {
            $d  = $redis->hGetAll($space);                  //获得视图缓存
            $ft = filemtime($dir);                          //获得视图文件最近修改时间
            if (!$d || $d['filectime'] <= $ft)              //视图缓存不存在或修改时间大于缓存时间，进入场景
            {
                $fg = file_get_contents($dir);              //获得视图文件内容
                $redis->hSet($space, 'file', $fg);          //存储视图缓存
                $redis->hSet($space, 'filectime', time());  //存储视图缓存时间
            }else{
                $fg = $d['file'];
            }
            return $fg;
        }else{
            throw new Exception("视图{$dir}不存在!");
        }
    }

}

