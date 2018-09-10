<?php
namespace deskyfly\php56\types;

class Object
{
    /**
     * @see \is_object
     */
    public static function isObject($val)
    {
        return is_object($val);
    }
}