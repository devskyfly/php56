<?php
namespace devskyfly\php56\types;

class String
{
    public static function isString($val)
    {
        return is_string($val);
    }
    
    public static function toString($val)
    {
        return strval($val);
    }
}