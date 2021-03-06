<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/3
 * Time: 17:23
 */

/**
 * 自动加载函数
 * @param $s
 */
function autoloads($s)
{
    $path = explode('\\',$s);

    $c = $path[1];

    if (isset($c))
    {
        switch ($c)
        {
            case 'con':
                $c = 'controller';
                break;
            case 'mod':
                $c = 'module';
                break;
            case 'vi':
                $c = 'view';
                break;
        }

        $path[1] = $c;

        $path = implode('/',$path);
    }else{
        $path = $path[0];
    }

    $a = './app/'.$path.'.php';

    if (file_exists($a))
    {
        include_once $a;
    }else{
        throw new Exception("找不到{$a}类！");
    }
}

/**
 * 入口方法
 * @throws Exception
 */
function go_index()
{
    global $tiem_index,$con_index,$fun_index;

    $path = explode('/',PATH_INFO);
    $p1   = $path[1] ?: $tiem_index;
    $p2   = $path[2] ?: $con_index;
    $p3   = $path[3] ?: $fun_index;

    define('TIEM',$p1);
    define('CON' ,$p2);
    define('FUN' ,$p3);

    if (is_dir(ROOT.'/app/'.$p1))
    {
        $c   = $p1.'\\con\\'.$p2;
        $f   = $p3;

        $con = new $c();

        if (method_exists($con,$f))
        {
            open_redis();//开启redis

            if (method_exists($con,'_initialize'))
            {
                $con->_initialize();//初始化默认执行
            }

            echo $con->$f();//执行动作
        }else{
            throw new Exception("找不到{$con}类的{$f}方法！");
        }
    }else{
        throw new Exception("找不到{$p1}端！");
    }
}

/**
 * 开启redis
 * 存储在$GLOBALS['redis']
 */
function open_redis()
{
    global $redis,$redis_ip,$redis_port;

    if (!($redis instanceof Redis))
    {
        $redis = new Redis();
        $redis->pconnect($redis_ip, $redis_port, 0);
        $GLOBALS['redis'] = $redis;
    }
}

/**
 * 重定向
 * @param $url
 * @param $start
 */
function headers($url,$start = false)
{
    global $view_replace;

    if ($start === true)
    {
        $url = $view_replace['__ROOT__'].$url;
    }
    header('Location: '.$url);
}

/**
 * 公共AJAX返回格式
 * @param $code         返回码
 * @param $data         返回数据
 * @param string $url   返回后跳转到URL（跳转动作由前端完成）
 * @return string
 */
function ajax_return($code,$data,$url = '')
{
    $arr = array(
        'code' => $code,
        'data' => $data,
        'url'  => $url
    );

    return json_encode($arr,JSON_UNESCAPED_UNICODE);
}