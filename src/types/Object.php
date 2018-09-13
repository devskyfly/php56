<?php
namespace devskyfly\php56\types;

class Object
{
    /**
     * Define whether the variable is boolean
     *
     * @param mixed $val
     * @return boolean
     */
    public static function isObject($val)
    {
        return is_object($val);
    }
}