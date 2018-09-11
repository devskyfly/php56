<?php
namespace devskyfly\php56\types;

class Variable
{
    public static function isNull($val)
    {
        return is_null($val);
    }
    
    public static function isEmpty($val)
    {
        return empty($val);
    }
    
    public static function isIterable($val)
    {
        return is_iterable($val);
    }
    
    public static function isResource($val)
    {
        return is_resource($val);
    }
    
    public static function setType(&$val,$type)
    {
        return settype($val, $type);
    }
    
    public static function isItSet($val)
    {
        return isset($val);
    }
    
    public static function unSetIt($val)
    {
        unset($val);
    }
    
    public static function serialize($val)
    {
        return serialize($val);
    }
    
    public static function unserialize($val)
    {
        return unserialize($val);
    }
    
    public static function varDump($val)
    {
        var_dump($val);
    }
    
    public static function varExport($val,$return=false)
    {
        var_export($val,$return);   
    }
}