<?php
namespace devskyfly\php56\types;

class Object
{
    /**
     * Define whether the variable is boolean
     *
     * @param mixed $val
     * @return boolean
     */
    public static function isObject($val)
    {
        return is_object($val);
    }
    
    /**
     * Define whether object belongs to curent class or this class is object parent
     * 
     * @param object $object
     * @param string $class_name
     * @return boolean
     */
    public static function isA($object,$class_name)
    {
        return is_a($object,$class_name);
    }
    
}