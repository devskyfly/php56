<?php
namespace devskyfly\php56\system;

class Info
{
    public static function phpInfo()
    {
        phpinfo();
    }
    
    /**
     * Return php version or extension version
     * 
     * @return string
     */
    public static function phpVersion($extension="")
    {
        $result="";
        if(empty($extension)){
            $result=phpversion($extension);
        }else{
            $result=phpversion($extension);
        }
        return $result;
    }
    
    /**
     * Compare php versions
     * 
     * @param string $version1
     * @param string $version2
     * @return integer -1 | 0 | 1
     */
    public static function versionCompare($version1,$version2)
    {
        return version_compare($version1, $version2, $operator);
    } 
    
    /**
     * Compare php versions by operator
     * @param string $version1
     * @param string $version2
     * @param string $operator
     * @return boolean
     */
    public static function versionCompareByOperator($version1,$version2,$operator)
    {
        return version_compare($version1, $version2, $operator);
    }   
}