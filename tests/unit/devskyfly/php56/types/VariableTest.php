<?php
namespace devskyfly\php56\types;

use phpDocumentor\Reflection\Types\Null_;

class VariableTest extends \Codeception\Test\Unit
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
        $result=Variable::isEmpty($val);
        $this->assertTrue($result);  
        
        $val="str";
        $result=Variable::isEmpty($val);
        $this->assertFalse($result); 
        
        $val=0;
        $result=Variable::isEmpty($val);
        $this->assertTrue($result);
        
        $val=1;
        $result=Variable::isEmpty($val);
        $this->assertFalse($result); 
        
        $val=[];
        $result=Variable::isEmpty($val);
        $this->assertTrue($result);
        
        $val=[1];
        $result=Variable::isEmpty($val);
        $this->assertFalse($result); 
    }
    
    public function testIsNull()
    {
        $val=null;
        $result=Variable::isNull($val);
        $this->assertTrue($result);
        
        $val=1;
        $result=Variable::isNull($val);
        $this->assertFalse($result); 
    }
    
    public function testIsScalar()
    {
        $val=1;
        $result=Variable::isScalar($val);
        $this->assertTrue($result);
        
        $val="string";
        $result=Variable::isScalar($val);
        $this->assertTrue($result);
        
        $val=null;
        $result=Variable::isScalar($val);
        $this->assertFalse($result);
        
        $val=new \DateTime();
        $result=Variable::isScalar($val);
        $this->assertFalse($result);
        
        $val=[];
        $result=Variable::isScalar($val);
        $this->assertFalse($result);
        
        $val=[1,2,3];
        $result=Variable::isScalar($val);
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
        $result=Variable::isCallable($val);
        $this->assertTrue($result);
        
        $val="string";
        $result=Variable::isCallable($val);
        $this->assertFalse($result);
    }
    
    public function testGetType()
    {
        $val="string";
        $type=Variable::getType($val);
        $this->assertEquals("string", $type);
        
        $val=2.5;
        $type=Variable::getType($val);
        $this->assertEquals("double", $type);
        
        $val=1;
        $type=Variable::getType($val);
        $this->assertEquals("integer", $type);
        
        $val=true;
        $type=Variable::getType($val);
        $this->assertEquals("boolean", $type);
        
        $val=false;
        $type=Variable::getType($val);
        $this->assertEquals("boolean", $type);
        
        $val=new \DateTime();
        $type=Variable::getType($val);
        $this->assertEquals("object", $type);
        
        $val=null;
        $type=Variable::getType($val);
        $this->assertEquals("NULL", $type);   
    }
    
    public function testSetType()
    {
        $val=1;
        $this->assertTrue(Variable::setType($val, "float"));
        $this->assertTrue(Variable::setType($val, "string"));
        $this->assertTrue(Variable::setType($val, "array"));
        $this->assertTrue(Variable::setType($val, "boolean"));
        $this->assertTrue(Variable::setType($val, "object"));
    }
    
}