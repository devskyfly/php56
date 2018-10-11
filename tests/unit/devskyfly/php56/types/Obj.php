<?php
namespace devskyfly\php56\types;

class Obj extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testIsObject()
    {
        $val=new \DateTime();
        $this->assertTrue(Obj::isObject($val));
    }
    
    public function testIsA()
    {
        $class_name=\Exception::class;
        $object=new \LogicException();
        $this->assertTrue(Obj::isA($object, $class_name));
        
        $class_name=\DateTime::class;
        $this->assertFalse(Obj::isA($object, $class_name));
    }
    
    public function testIsSubClassOf()
    {
        class SubDateTime extends \DateTime
        {
            
        }
        
        $sub_class=new SubDateTime();
        
        $this->assertTrue(Obj::isSubClassOf($sub_class,\DateTime::class));
        
        $this->assertTrue(Obj::isSubClassOf($sub_class,\LogicException::class));
    }
    
}