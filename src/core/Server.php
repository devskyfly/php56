<?php
namespace devskyfly\php56\core;

use devskyfly\php56\types\Vrbl;

class Server
{
    /**
     * Set server env
     * @param string $map "PROP=VAL"
     * @return boolean
     */
    public static function putEnv($map)
    {
        return putenv($map);
    }
    
    /**
     * Return server env
     * @param string $var
     * @return array | false
     */
    public static function getEnv($var="")
    {
        if (Vrbl::isEmpty($var)) {
            return getenv($var);
        } else {
            return getenv();
        }
    }
    
    /**
     * Return $_SERVER element value or if it does not exist return false
     * @param string $param_name
     * @param mixed $default_value - default value on non element exist
     * @return string
     */
    public static function getServerParam($param_name, $default_value=false)
    {
        return Vrbl::getValue($_SERVER, $param_name, $default_value);
    }
    
    /**
     * Return $_GET element value or if it does not exist return false
     * @param string $param_name
     * @param mixed $default_value - default value on non element exist
     * @return string
     */
    public static function getGetParam($param_name, $default_value=false)
    {
        return Vrbl::getValue($_GET, $param_name, $default_value);
    }
    
    /**
     * Return $_POST element value or if it does not exist return false
     * @param string $param_name
     * @param mixed $default_value - default value on non element exist
     * @return string
     */
    public static function getPostParam($param_name, $default_value=false)
    {
        return Vrbl::getValue($_POST, $param_name, $default_value);
    }
    
    /**
     * Return $_REQUEST element value or if it does not exist return false
     * @param string $param_name
     * @param mixed $default_value - default value on non element exist
     * @return string
     */
    public static function getRequestParam($param_name, $default_value=false)
    {
        return Vrbl::getValue($_REQUEST, $param_name, $default_value);
    }
    
    /**
     * Return $_SESSION element value or if it does not exist return false
     * @param string $param_name
     * @param mixed $default_value - default value on non element exist
     * @return string
     */
    public static function getSessionParam($param_name, $default_value=false)
    {
        return Vrbl::getValue($_SESSION, $param_name, $default_value);
    }
    
    /**
     * Return $_FILES element value or if it does not exist return false
     * @param string $param_name
     * @param mixed $default_value - default value on non element exist
     * @return string
     */
    public static function getFilesParam($param_name, $default_value=false)
    {
        return Vrbl::getValue($_FILES, $param_name, $default_value);
    }
    
    /**
     * Return $_COOKIE element value or if it does not exist return false
     * @param string $param_name
     * @param mixed $default_value - default value on non element exist
     * @return string
     */
    public static function getCookieParam($param_name, $default_value=false)
    {
        return Vrbl::getValue($_COOKIE, $param_name, $default_value);
    }
}
