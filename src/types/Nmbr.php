<?php
namespace devskyfly\php56\types;

class Nmbr
{
    const NAN=NaN;
    const EPSILON=0.00001;
    const INT_SIZE=PHP_INT_SIZE;
    const INT_MAX=PHP_INT_MAX;
    /**
     *
     * @link https://www.php.net/manual/en/language.types.float.php#language.types.float.comparison
     * @param number $val_1
     * @param number $val_2
     * @throws \InvalidArgumentException
     * @return boolean
     */
    public static function isEqual($val_1, $val_2)
    {
        if (!self::isNumeric($val_1)) {
            throw new \InvalidArgumentException("Param val_1 is not numeric.");
        }
        if (!self::isNumeric($val_2)) {
            throw new \InvalidArgumentException("Param val_2 is not numeric.");
        }
        
        if (self::toInteger($val_1)&&self::toInteger($val_2)) {
            if ($val_1==$val_2) {
                return true;
            }
        } else {
            $val_1=self::toDouble($val_1);
            $val_2=self::toDouble($val_2);
            if (abs($val_1-$val_2)<self::EPSILON) {
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Define whether the variable is NaN
     * 
     * NaN is special constant 
     *
     * @link https://www.php.net/manual/en/function.is-nan.php
     * @param float $val
     * @return boolean
     */
    public static function isNan($val)
    {
        return is_nan($val);
    }
    
    /**
     * Define whether the variable is numeric
     *
     * @link https://www.php.net/manual/en/function.is-numeric.php
     * @param mixed $val
     * @return boolean
     */
    public static function isNumeric($val)
    {
        return is_numeric($val);
    }
    
    /**
     * Define whether the variable is double
     *
     * @link https://www.php.net/manual/en/function.is-float.php
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
     * @link https://www.php.net/manual/en/function.is-int.php
     * @param mixed $val
     * @return boolean
     */
    public static function isInteger($val)
    {
        return (is_int($val));
    }
    
    /**
     * Convert value to double
     * 
     * It is a wrapper of core function.
     * Generate E_NOTICE and return 1 on object use.
     * 
     * @link https://www.php.net/manual/en/function.floatval.php
     * @param mixed $val
     * @throws E_NOTICE
     * @return number
     */
    public static function toDouble($val)
    {
        return floatval($val);
    }
    
    /**
     * Convert value to integer
     * 
     * It is a wrapper of core function.
     * Generate E_NOTICE and return 1 on object use.
     * 
     * @link https://www.php.net/manual/en/function.intval.php
     * @param mixed $val
     * @throws E_NOTICE
     * @return number
     */
    public static function toInteger($val)
    {
        return intval($val);
    }
    
    /**
     * Convert value to double in strict mode
     * 
     * @link https://www.php.net/manual/en/function.floatval.php
     * @param mixed $val
     * @throws \InvalidArgumentException
     * @return number
     */
    public static function toDoubleStrict($val)
    {
        if (!self::isNumeric($val)) {
            throw new \InvalidArgumentException("Param val is not numeric.");
        }

        return floatval($val);
    }
    
    /**
     * Convert value to integer in strict mode
     * 
     * @link https://www.php.net/manual/en/function.intval.php
     * @param mixed $val
     * @throws \InvalidArgumentException
     * @return number
     */
    public static function toIntegerStrict($val)
    {
        if (!self::isNumeric($val)) {
            throw new \InvalidArgumentException("Param val is not numeric.");
        }
        return intval($val);
    }
}
