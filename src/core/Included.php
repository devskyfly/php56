<?php
namespace devskyfly\php56\core;

class Included
{
    /**
     * Return files names of included files to script
     * 
     * @return array
     */
    public static function getFiles()
    {
        return get_included_files();
    }

    
    public static function inc($file)
    {
        return include($file);
    }
    
    public static function inc_once($file)
    {
        return include_once($file);
    }
    
    public static function req($file)
    {
        return require($file);
    }
    
    public static function inc_once($file)
    {
        return require_once($file);
    }
}