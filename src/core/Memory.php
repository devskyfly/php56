<?php
namespace devskyfly\php56\core;

class Memory
{
    /**
     * Return current memory usege in bytes
     * @return number
     */
    public static function get()
    {
        return memory_get_usage(true);
    }
    
    /**
     * Return max memory usage in bytes
     */
    public static function getMax()
    {
        return memory_get_peak_usage(true);
    }
}