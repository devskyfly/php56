<?php
namespace devskyfly\php56\types;

class Str
{
    /**
     * Define whether the variable is string
     *
     * @link https://www.php.net/manual/en/function.is-string.php
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
     * @link https://www.php.net/manual/en/function.strval.php
     * @param mixed $val
     * @return string
     */
    public static function toString($val)
    {
        return strval($val);
    }
    
    
    /**
     * Join array elements eith string.
     *
     * @link https://www.php.net/manual/en/function.implode.php
     * @param string $glue
     * @param array $pieses
     * @throws \InvalidArgumentException
     * @return string
     */
    public static function implode($glue, $pieses)
    {
        if (!Str::isString($glue)) {
            throw new \InvalidArgumentException('Parameter $glue is not string type.');
        }
        if (!Arr::isArray($pieses)) {
            throw new \InvalidArgumentException('Parameter $pieses is not array type.');
        }
        return implode($glue, $pieses);
    }
}
