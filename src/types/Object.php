<?php
namespace devskyfly\php56\types;

class Object
{
    /**
     * Define whether the variable is boolean
     *
     * @param mixed $val
     * @return boolean
     */
    public static function isObject($val)
    {
        return is_object($val);
    }
    
    /**
     * Define whether object belongs to curent class or this class is object parent
     * 
     * @param object $object
     * @param string $class_name
     * @return boolean
     */
    public static function isA($object,$class_name)
    {
        return is_a($object,$class_name);
    }
    
    /**
     * Return namespace name of current namespace
     * @return string
     */
    public static function getNamespaceName()
    {
        return __NAMESPACE__;
    }
    
    /**
     * Return trait name including namespace
     * @return string
     */
    public static function getTraitName()
    {
        return __TRAIT__;
    }
    
    /**
     * Check if trait exists
     *  
     * @param string $traitname
     * @throws \Exception
     * @return boolean
     */
    public static function traitExists($trait_name)
    {
        $result=trait_exists($trait_name);
        if(Variable::isNull($result)) throw new \Exception("Trait existing check error.");
        return $result;
    }
    
    /**
     * Check if class exists
     *
     * @param string $class_name
     * @return boolean
     */
    public static function classExists($class_name)
    {
        return class_exists($traitname);
    }
    
    
    /**
     * Check if property exists
     *
     * @param string|object $class_obj
     * @param string $property
     * @throws \Exception
     * @return boolean
     */
    public static function classPropertyExists($class_obj,$property)
    {
        $result=property_exists($class_obj,$property);
        if(Variable::isNull($result)) throw new \Exception("Property existing check error.");
        return $result;
    }
    
    /**
     * Check if method exists
     *
     * @param string|object $class_obj
     * @param string $property
     * @throws \Exception
     * @return boolean
     */
    public static function classMethodExists($class_obj,$property)
    {
        $result=property_exists($class_obj,$property);
        if(Variable::isNull($result)) throw new \Exception("Property existing check error.");
        return $result;
    }
}