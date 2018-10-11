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

    public static function inc($file_path)
    {
        return include($file_path);
    }
    
    public static function inc_once($file_path)
    {
        return include_once($file_path);
    }
    
    public static function req($file_path)
    {
        return require($file_path);
    }
    
    public static function inc_once($file_path)
    {
        return require_once($file_path);
    }
}