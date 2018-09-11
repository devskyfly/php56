<?php
namespace devskyfly\php56\core;

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
    
    /**
     * Return list of loaded extensions
     * 
     * @return array
     */
    public static function getList()
    {
        return get_loaded_extensions();
    }
    
    /**
     * Return list of loaded Zend extensions
     *
     * @return array
     */
    public static function getZendList()
    {
        return get_loaded_extensions(true);
    }
    
    /**
     * Return list of extension functions
     * 
     * @param string $extension
     * @return array
     */
    public static function getFunctions($extension)
    {
        return get_extension_funcs($extension);
    }
}