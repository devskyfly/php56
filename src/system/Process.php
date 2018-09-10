<?php
namespace devskyfly\php56\system;

class Process
{
    /**
     * Return process id
     * 
     * @return number
     */
    public static function getPid()
    {
        return getmypid();
    }
    
    /**
     * Return user id
     * 
     * @return number
     */
    public static function getUid()
    {
        return getmyuid();
    }
    
    /**
     * Return script inode
     * @return unknown
     */
    public static function getINode()
    {
     return getinode();    
    }
    
    public static function getScriptUserName()
}