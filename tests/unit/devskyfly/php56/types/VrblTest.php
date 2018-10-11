<?php
namespace devskyfly\php56\types;

use phpDocumentor\Reflection\Types\Null_;

class VrblTest extends \Codeception\Test\Unit
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
    public function testIsEmpty()
    {
        $val="";
        $result=Vrb::isEmpty($val);
        $this->assertTrue($result);  
        
        $val="str";
        $result=Vrb::isEmpty($val);
        $this->assertFalse($result); 
        
        $val=0;
        $result=Vrb::isEmpty($val);
        $this->assertTrue($result);
        
        $val=1;
        $result=Vrb::isEmpty($val);
        $this->assertFalse($result); 
        
        $val=[];
        $result=Vrb::isEmpty($val);
        $this->assertTrue($result);
        
        $val=[1];
        $result=Vrb::isEmpty($val);
        $this->assertFalse($result); 
    }
    
    public function testIsNull()
    {
        $val=null;
        $result=Vrb::isNull($val);
        $this->assertTrue($result);
        
        $val=1;
        $result=Vrb::isNull($val);
        $this->assertFalse($result); 
    }
    
    public function testIsScalar()
    {
        $val=1;
        $result=Vrb::isScalar($val);
        $this->assertTrue($result);
        
        $val="string";
        $result=Vrb::isScalar($val);
        $this->assertTrue($result);
        
        $val=null;
        $result=Vrb::isScalar($val);
        $this->assertFalse($result);
        
        $val=new \DateTime();
        $result=Vrb::isScalar($val);
        $this->assertFalse($result);
        
        $val=[];
        $result=Vrb::isScalar($val);
        $this->assertFalse($result);
        
        $val=[1,2,3];
        $result=Vrb::isScalar($val);
        $this->assertFalse($result);
    }
    
    /* public function testIsIterable()
    {
        $val=[1,2,3];
        $result=Variable::isIterable($val);
        $this->assertTrue($result);
        
        $val="string";
        $result=Variable::isIterable($val);
        $this->assertFalse($result);
    }
    
    public function testIsCountable()
    {
        $val=[1,2,3];
        $result=Variable::isCountable($val);
        $this->assertTrue($result);
        
        $val="string";
        $result=Variable::isCountable($val);
        $this->assertFalse($result);
    } */
    
    
    public function testIsCallable()
    {
        $val=function(){};
        $result=Vrb::isCallable($val);
        $this->assertTrue($result);
        
        $val="string";
        $result=Vrb::isCallable($val);
        $this->assertFalse($result);
    }
    
    public function testGetType()
    {
        $val="string";
        $type=Vrb::getType($val);
        $this->assertEquals("string", $type);
        
        $val=2.5;
        $type=Vrb::getType($val);
        $this->assertEquals("double", $type);
        
        $val=1;
        $type=Vrb::getType($val);
        $this->assertEquals("integer", $type);
        
        $val=true;
        $type=Vrb::getType($val);
        $this->assertEquals("boolean", $type);
        
        $val=false;
        $type=Vrb::getType($val);
        $this->assertEquals("boolean", $type);
        
        $val=new \DateTime();
        $type=Vrb::getType($val);
        $this->assertEquals("object", $type);
        
        $val=null;
        $type=Vrb::getType($val);
        $this->assertEquals("NULL", $type);   
    }
    
    public function testSetType()
    {
        $val=1;
        $this->assertTrue(Vrb::setType($val, "float"));
        $this->assertTrue(Vrb::setType($val, "string"));
        $this->assertTrue(Vrb::setType($val, "array"));
        $this->assertTrue(Vrb::setType($val, "boolean"));
        $this->assertTrue(Vrb::setType($val, "object"));
    }
    
}