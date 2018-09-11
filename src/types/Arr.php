<?php
namespace devskyfly\php56\types;

class Arr
{
    /**
     * 
     * @param mixed $val
     * @return boolean
     */
    public static function isArray($val)
    {
        return is_array($val);
    }
}