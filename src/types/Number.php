<?php
namespace devskyfly\php56\types;

class Number
{   
    const EPSILON=0.00001;
    
    /**
     * 
     * @param number $val_1
     * @param number $val_2
     * @throws \InvalidArgumentException
     * @return boolean
     */
    public static function isEqual($val_1,$val_2)
    {     
        if(!self::isNumeric($val_1)) 
        {
            throw new \InvalidArgumentException("Param val_1 is not numeric");
        }
        if(!self::isNumeric($val_2))
        {
            throw new \InvalidArgumentException("Param val_2 is not numeric");
        }
        
        if(self::isInt($val_1)&&self::isInt($val_2))
        {
            if($val_1==$val_2) return true;
        }else{
            $val_1=self::toFloat($val_1);
            $val_2=self::toFloat($val_2);
            if(abs($val_1-$val_2)<self::EPSILON)
            {
                return true;
            }
        }
        
        return false;
    }
    
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
     * Define whether the variable is int
     *
     * @param mixed $val
     * @return boolean
     */
    public static function isInt($val)
    {
        return (is_Int($val));
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