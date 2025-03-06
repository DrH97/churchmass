<?php

namespace App;

trait StaticTableName
{
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
