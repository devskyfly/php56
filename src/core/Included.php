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
}