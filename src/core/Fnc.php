<?php
namespace devskyfly\php56\core;

class Fnc
{
    /**
     * Return number of arguments passed to function
     * @return int
     */
    public static function getArgumentsNmb()
    {
        return func_num_args();
    }
    
    /**
     * Return arguments passed to function in array
     * @return array
     */
    public static function getArguments()
    {
        return func_get_args();
    }
    
    /**
     * Return argument passed to function by index
     * @param $index
     * @return mixed
     */
    public static function getArgumentByIndex($index)
    {
        return func_get_arg($index);
    }
}