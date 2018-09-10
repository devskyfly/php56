<?php
namespace devskyfly\php56\system;

class Ini
{
    public static function getAll($extension="",$details=true)
    {
        return ini_get_all($extension,$details);
    }
    
    public static function get($val)
    {
        return ini_get($val);
    }
    
    public static function set($property,$val)
    {
        return ini_set($property,$val);
    }
    
    public static function restore($property)
    {
        ini_restore($property);
    }
}