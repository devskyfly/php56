<?php
namespace devskyfly\php56\types;

class String
{
    /**
     * Define whether the variable is string
     * 
     * @param mixed $val
     * @return boolean
     */    
    public static function isString($val)
    {
        return is_string($val);
    }
    
    /**
     * Return the string value of a variable
     * 
     * @param mixed $val
     * @return string
     */
    public static function toString($val)
    {
        return strval($val);
    }
}