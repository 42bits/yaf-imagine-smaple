<?php

class ImageModel extends Db_Mysql
{
    public $table = 'images';

    /**
     * @return string
     */
    public function table()
    {
        return $this->table;
    }
}