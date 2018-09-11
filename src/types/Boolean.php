<?php
namespace devskyfly\php56\types;

class Boolean
{
    public static function isBoolean($val)
    {
        return is_bool($val);
    }
}