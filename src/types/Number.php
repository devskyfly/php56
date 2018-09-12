<?php
namespace devskyfly\php56\types;

class Number
{   
    /**
     * Define whether the variable is NaN
     *
     * @param mixed $val
     * @return boolean
     */
    public static function isNan($val)
    {
        return (is_nan($val));
    }
    
    /**
     * Define whether the variable is numeric
     *
     * @param mixed $val
     * @return boolean
     */
    public static function isNumeric($val)
    {
        return (is_numeric($val));
    }
    
    /**
     * Define whether the variable is float
     *
     * @param mixed $val
     * @return boolean
     */
    public static function isFloat($val)
    {
        return (is_float($val));
    }
    
    /**
     * Define whether the variable is double
     *
     * @param mixed $val
     * @return boolean
     */
    public static function isDouble($val)
    {
        return (is_double($val));
    }
    
    /**
     * Define whether the variable is long
     *
     * @param mixed $val
     * @return boolean
     */
    public static function isLong($val)
    {
        return (is_long($val));
    }
    
    /**
     * Convert value to float
     * @param mixed $val
     * @return number
     */
    public static function toFloat($val)
    {
        return floatval($val);
    }
    
    /**
     * Convert value to double
     * @param mixed $val
     * @return number
     */
    public static function toDouble($val)
    {
        return doubleval($val);
    }
    
    /**
     * Convert value to integer
     * @param mixed $val
     * @return number
     */
    public static function toInteger($val)
    {
        return intval($val);
    }
}