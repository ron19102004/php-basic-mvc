<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/query.db.php");
class BaseModel
{
    public static function all($table)
    {
        return BaseQuery::all($table);
    }
    public static function findById($table, $id)
    {
        return BaseQuery::findAll($table)
            ->where()
            ->condition(
                ['id'],
                ['='],
                [$id]
            )->getOne();
    }
    public static function find($table)
    {
        return BaseQuery::find($table);
    }
    public static function save($table, $keys = array(), $values = array())
    {
        BaseQuery::insert($table, $keys, $values);
    }
    public static function update(
        $table,
        $keys = array(),
        $values = array(),
        $conditions = array(),
        $valuesCondition =  array()
    ) {
        BaseQuery::update($table, $keys, $values, $conditions, $valuesCondition);
    }
}
