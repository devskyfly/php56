<?php
namespace devskyfly\php56\core;

use devskyfly\php56\types\Variable;

class Server
{
    /**
     * Set server env
     * @param string $map "PROP=VAL"
     * @return boolean
     */
    public static function putEnv($map)
    {
        return putenv();
    }
    
    /**
     * Return server env
     * @param string $var
     * @return array | false
     */
    public static function getEnv($var)
    {
        return getenv();
    }
    
    public static function getServerParam($param_name,$default_value=false)
    {
        
    }
    
    public static function getGetParam($param_name,$default_value=false)
    {
        
    }
    
    public static function getPostParam($param_name,$default_value=false)
    {
        
    }
    
    public static function getFilesParam($param_name,$default_value=false)
    {
        
    }
    
    protected static function getParam($array,$param_name,$defualt_value)
    {
        if(Variable::isItSet($array[$param_name])){
            return $array[$param_name];
        }else{
            return $defualt_value;
        }
    }
    
}