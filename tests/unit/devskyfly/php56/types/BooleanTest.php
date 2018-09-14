<?php
namespace devskyfly\php56\types;

class BooleanTest extends \Codeception\Test\Unit
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
    public function testIsBoolean()
    {
        $val=true;
        $this->assertTrue(Boolean::isBoolean($val));
        
        $val=false;
        $this->assertTrue(Boolean::isBoolean($val));
        
        $val="string";
        $this->assertFalse(Boolean::isBoolean($val));
    }
    
    // tests
    public function testToBoolean()
    {
        $val=1;
        $result=Boolean::toBoolean($val);
        $this->assertTrue($result);
        
        $val="string";
        $result=Boolean::toBoolean($val);
        $this->assertTrue($result);
        
        $val=[1];
        $result=Boolean::toBoolean($val);
        $this->assertTrue($result);
        
        $val=0;
        $result=Boolean::toBoolean($val);
        $this->assertFalse($result);
        
        $val="";
        $result=Boolean::toBoolean($val);
        $this->assertFalse($result);
        
        $val=[];
        $result=Boolean::toBoolean($val);
        $this->assertFalse($result);
    }
}