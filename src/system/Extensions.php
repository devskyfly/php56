<?php
namespace devskyfly\php56\system;

class Extensions
{
    public static function dowload($library)
    {
        return dl();
    }
    
    public static function isLoaded($library)
    {
        return extension_loaded($library);
    }
    
}