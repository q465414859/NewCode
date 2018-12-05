<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/4
 * Time: 21:52
 */

class Db
{
    private static $Db;
    private static $name;
    private static $host;
    private static $user;
    private static $pass;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function go($name,$host,$user,$pass)
    {
        if (self::$name !== $name || self::$host !== $host || self::$user !== $user || self::$pass === $name)
        {
            self::$Db = NULL;
        }
        if (self::$Db)
        {
            return self::$Db;
        }else{
            $new_db = new PDO("mysql:dbname={$name};host={$host}",$user,$pass);
            self::$name = $name;
            self::$host = $host;
            self::$user = $user;
            self::$pass = $pass;
            self::$Db   = $new_db;
            return $new_db;
        }
    }
}