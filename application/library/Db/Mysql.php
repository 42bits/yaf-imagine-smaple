<?php

use Medoo\Medoo;

class Db_Mysql extends Medoo
{

    public function __construct()
    {
        $dbInfo = Yaf\Registry::get('config')->db->toArray();
        parent::__construct($dbInfo);
    }
}