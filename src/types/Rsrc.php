<?php
namespace devskyfly\php56\type;

/**
 *
 * @author devskyfly
 * @todo Need test
 */
class Rsrc
{
    /**
     * Define whether the variable is resource
     *
     * @link https://www.php.net/manual/en/function.is-resource.php
     * @param mixed $val
     * @return boolean
     */
    public static function isResource($val)
    {
        return is_resource($val);
    }
    
    /**
     * Return type of resource
     *
     * Return string representation of resource type. String will be "Unknown" if resource is not defined.
     * If type $resource is not resorce return NULL and generate error.
     *
     * @link https://www.php.net/manual/en/function.get-resource-type.php
     * @param resource $resource
     * @return string | null
     */
    public static function getType($resource)
    {
        return get_resource_type($resource);
    }
}
