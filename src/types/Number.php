<?php
namespace devskyfly\php56\types;

class Number
{   
    public static function isNan($val)
    {
        return (is_nan($val));
    }
    
    public static function isNumeric($val)
    {
        return (is_numeric($val));
    }
    
    public static function isFloat($val)
    {
        return (is_float($val));
    }
    
    public static function isDouble($val)
    {
        return (is_double($val));
    }
    
    public static function isLong($val)
    {
        return (is_long($val));
    }
     
    public static function toFloat($val)
    {
        return floatval($val);
    }
    
    public static function toDouble($val)
    {
        return doubleval($val);
    }
    
    public static function toInteger($val)
    {
        return intval($val);
    }
}