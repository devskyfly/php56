<?php
namespace devskyfly\php56\core;

use devskyfly\php56\types\Variable;
 class Cls
 {
     /**
      * Return class name including namespace
      * @return string
      */
     public static function getClassName()
     {
         return __CLASS__;
     }
     
     /**
      * Return class method name
      * @return string
      */
     public static function getMethodName()
     {
         return __METHOD__;
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
    
     /**
      * Define whether the class or object is sub class of target class
      *
      * @param object|string $object - object or class name
      * @param string $class_name
      */
     public static function isSubClassOf($object,$class_name)
     {
         return is_subclass_of($object, $class_name);
     }
 }