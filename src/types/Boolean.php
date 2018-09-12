<?php
namespace devskyfly\php56\types;

class Boolean
{
    
    /**
     * Define whether the variable is boolean
     *
     * @param mixed $val
     * @return boolean
     */
    public static function isBoolean($val)
    {
        return is_bool($val);
    }
    
    /**
     * Convert value to bool
     * 
     * @param mixed $val
     * @return boolean
     */
    public static function toBool($val)
    {
        return boolval($val);    
    }
}