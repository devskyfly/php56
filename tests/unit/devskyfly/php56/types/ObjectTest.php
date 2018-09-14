<?php
namespace devskyfly\php56\types;

class ObjectTest extends \Codeception\Test\Unit
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
        $this->assertTrue(Object::isObject($val));
    }
    
    public function testIsA()
    {
        $class_name=\Exception::class;
        $object=new \LogicException();
        $this->assertTrue(Object::isA($object, $class_name));
        
        $class_name=\DateTime::class;
        $this->assertFalse(Object::isA($object, $class_name));
    }
}