<?php
namespace devskyfly\php56\core;

use devskyfly\php56\types\Variable;

class Cli
{
    /**
     * Set title to current process
     * @param unknown $title
     * @return boolean
     */
    public static function setProcessTitle($title)
    {
        return cli_set_process_title($title);
    }
    
    /**
     * Return current process title
     * @return string
     */
    public static function getProcessTitle()
    {
        return cli_set_process_title($title);
    }


    /**
     * Return parems arrray passed to script
     * @param string $keys_list [a-z|A-Z|0-9] "ij:k::" - "i" without value, "j" require value, "k" does not require value 
     * @param array $dbl_keys_list [a-z|A-Z|0-9] ["i", "j:", "k::"] - "i" without value, "j" require value, "k" does not require value 
     * @return array | false
     */
    public static function getParams($keys_list, $dbl_keys_list)
    {
        if(Variable::isItSet($dbl_keys_list))
        {
            return getopt($keys_list);
        }else{
            return getopt($keys_list,$dbl_keys_list);
        }
        
    }
}