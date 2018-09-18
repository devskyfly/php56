<?php
namespace devskyfly\php56\libs\arr;

use devskyfly\php56\types\Variable;
use devskyfly\php56\types\Number;

class Sort
{
    const SORT_REGULAR=SORT_REGULAR;
    const SORT_NUMERIC=SORT_NUMERIC;
    const SORT_STRING=SORT_STRING;
    const SORT_LOCALE_STRING=SORT_LOCALE_STRING;
    const SORT_NATURAL=SORT_NATURAL;
    const SORT_FLAG_CASE=SORT_FLAG_CASE;
    
    /**
     * Sort array by values using flag to define sort algorithm
     * 
     * @param array $array
     * @param integer $flag
     * @throws \InvalidArgumentException
     * @return boolean
     */
    public static function sort(&$array,$flag=self::SORT_REGULAR)
    {
        if(!self::isArray($array)){
            throw new \InvalidArgumentException('Param $array is not array type.');
        }
        if(!Number::isInteger($flag)){
            throw new \InvalidArgumentException('Param $flag is not array type.');
        }
        return sort($array,$flag);
    }
    
    /**
     * Sort array by handler function with saving keys
     * 
     * @param array $array
     * @param callable $handler
     * @throws \InvalidArgumentException
     * @return boolean
     */
    public static function sortByHandlerWithKeysSave(&$array,$handler)
    {
        if(!self::isArray($array)){
            throw new \InvalidArgumentException('Param $array is not array type.');
        }
        if(!Variable::isCallable($handler)){
            throw new \InvalidArgumentException('Param $handler is not array type.');
        }
        return uasort(&$array,$handler);
    }
    
    /**
     * Sort array by keys and handler function
     *
     * @param array $array
     * @param callable $handler
     * @throws \InvalidArgumentException
     * @return boolean
     */
    public static function sortByKeysAndHandler(&$array,$handler)
    {
        if(!self::isArray($array)){
            throw new \InvalidArgumentException('Param $array is not array type.');
        }
        if(!Variable::isCallable($handler)){
            throw new \InvalidArgumentException('Param $handler is not array type.');
        }
        return uksort(&$array,$handler);
    }
    
    /**
     * Sort array by handler function with saving keys
     *
     * @param array $array
     * @param callable $handler
     * @throws \InvalidArgumentException
     * @return boolean
     */
    public static function sortByHandler(&$array,$handler)
    {
        if(!self::isArray($array)){
            throw new \InvalidArgumentException('Param $array is not array type.');
        }
        if(!Variable::isCallable($handler)){
            throw new \InvalidArgumentException('Param $handler is not array type.');
        }
        return usort(&$array,$handler);
    }
}