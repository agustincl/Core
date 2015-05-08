<?php
namespace acl\Core\Forms;

class Fields
{
    public static function readFieldsNumeric($array)
    {
        $data = [];
        foreach ($array as $value)
        {
            $data[$value[1]]=$value[0];
        }
        return $data;
    } 

    public static function readFields($keyColumn, $valColumn, $array)
    {
        $data = [];
        foreach ($array as $value)
        {
            $data[$value[$valColumn]]=$value[$keyColumn];
        }
        return $data;
    }
}
