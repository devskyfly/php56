<?php
namespace devskyfly\php56\core;

use BadMethodCallException;
use devskyfly\php56\types\Str;
use RuntimeException;

class Fnc
{
    
    /**
     * Define whether the function exists
     *
     * @link https://www.php.net/manual/en/function.function-exists.php
     * @param string $function
     * @throws \InvalidArgumentException
     * @return boolean
     */
    public static function exists($function)
    {
        if (!Str::isString($function)) {
            throw new \InvalidArgumentException('Param $function is not string type.');
        }
        return function_exists($function);
    }
    
    /**
     * Return number of arguments passed to function
     * 
     * Use func_num_args
     * @link https://www.php.net/manual/en/function.func-num-args
     * @throws \BadMethodCallException
     */
    public static function getArgumentsNmb()
    {
        throw new \BadMethodCallException('User terminated method.');
    }
    
    /**
     * Return arguments passed to function in array
     * 
     * Use func_get_args
     * @link https://www.php.net/manual/en/function.func-get-args.php
     * @throws \BadMethodCallException
     */
    public static function getArguments()
    {
        throw new \BadMethodCallException('User terminated method.');
    }
    
    /**
     * Return argument passed to function by index
     * 
     * Use func_get_arg
     * @link https://www.php.net/manual/en/function.func-get-arg.php
     * @throws \BadMethodCallException
     */
    public static function getArgumentByIndex($index)
    {
        throw new \BadMethodCallException('User terminated method.');
    }
}
