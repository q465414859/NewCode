<?php
/**
 * Created by PhpStorm.
 * User: Code刘
 * Date: 2018/12/4
 * Time: 18:15
 */

class module
{
    private $Db;
    private $Sm;

    public function __construct()
    {
        global $db_host;

        $this->Db = Db::go($db_host['name'],$db_host['host'],$db_host['user'],$db_host['pass']);
    }

    public function get_Db()
    {
        return $this->Db;
    }

    /**
     * 执行SQL
     * @param $sql
     * @param $data
     * @return $this
     * @throws Exception
     */
    public function query($sql,$data)
    {
        $Db = $this->Db;
        $Sm = $Db->prepare($sql,array($Db::ATTR_CURSOR => $Db::CURSOR_FWDONLY));
        $Sm ->execute($data);

        $err = $Sm->errorInfo();

        if ($err[0] !== '00000')
        {
            print_r($err);
            print_r($sql);
            throw new Exception('SQL执行错误!');
        }else{
            $this->Sm = $Sm;
            return $this;
        }
    }

    /**
     * 返回SQL查询数据
     * @return array
     * @throws Exception
     */
    public function fetchAll()
    {
        $Sm = $this->Sm;

        if ($Sm instanceof PDOStatement)
        {
            return $Sm->fetchAll(2);
        }else{
            throw new Exception('需要先执行query()!');
        }
    }

    /**
     * 返回SQL影响行数
     * @return int
     * @throws Exception
     */
    public function rowCount()
    {
        $Sm = $this->Sm;

        if ($Sm instanceof PDOStatement)
        {
            return $Sm->rowCount();
        }else{
            throw new Exception('需要先执行query()!');
        }
    }

    /**
     * 开启事务
     */
    public function transaction()
    {
        $this->Db->beginTransaction();
    }

    /**
     * 提交事务
     */
    public function commit()
    {
        $this->Db->commit();
    }

    /**
     * 回滚事务
     */
    public function rollBack()
    {
        $this->Db->rollBack();
    }
}
