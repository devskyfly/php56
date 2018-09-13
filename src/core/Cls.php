<?php
namespace devskyfly\php56\core;
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
 }