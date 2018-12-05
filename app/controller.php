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
     * @param string $view
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

        $f = './app/'.$tiem.'/view/'.$con.'/'.$fun.'.html';

        if (file_exists($f) === true)
        {
        }else{
            throw new Exception("视图{$f}不存在!");
        }
    }
}