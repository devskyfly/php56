<?php
namespace devskyfly\php56\types;

use phpDocumentor\Reflection\Types\Null_;

class VrblTest extends \Codeception\Test\Unit
{
    // tests
    public function testGetValue()
    {
        $arr=["a"=>"val"];
        
        $val = Vrbl::getValue($arr, "a");
        $this->assertEquals($val, $arr["a"]);

        /*$val = Vrbl::getValue($arr, "b");
        $this->assertTrue(Vrbl::isNull($val));*/
    }

    public function testIsNull()
    {
        $val=null;
        $result=Vrbl::isNull($val);
        $this->assertTrue($result);
        
        $val=1;
        $result=Vrbl::isNull($val);
        $this->assertFalse($result);
    }

    public function testIsEmpty()
    {
        $val="";
        $result=Vrbl::isEmpty($val);
        $this->assertTrue($result);
        
        $val="str";
        $result=Vrbl::isEmpty($val);
        $this->assertFalse($result);
        
        $val=0;
        $result=Vrbl::isEmpty($val);
        $this->assertTrue($result);
        
        $val=1;
        $result=Vrbl::isEmpty($val);
        $this->assertFalse($result);
        
        $val=[];
        $result=Vrbl::isEmpty($val);
        $this->assertTrue($result);
        
        $val=[1];
        $result=Vrbl::isEmpty($val);
        $this->assertFalse($result);
    }
    
    public function testIsScalar()
    {
        $val=1;
        $result=Vrbl::isScalar($val);
        $this->assertTrue($result);
        
        $val="string";
        $result=Vrbl::isScalar($val);
        $this->assertTrue($result);
        
        $val=null;
        $result=Vrbl::isScalar($val);
        $this->assertFalse($result);
        
        $val=new \DateTime();
        $result=Vrbl::isScalar($val);
        $this->assertFalse($result);
        
        $val=[];
        $result=Vrbl::isScalar($val);
        $this->assertFalse($result);
        
        $val=[1,2,3];
        $result=Vrbl::isScalar($val);
        $this->assertFalse($result);
    }
    
     public function testIsIterable()
    {
        $val=[1,2,3];
        $result=Vrbl::isIterable($val);
        $this->assertTrue($result);

        $val="string";
        $result=Vrbl::isIterable($val);
        $this->assertFalse($result);
    }
    
    /*public function testIsCountable()
    {
        $val=[1,2,3];
        $result=Vrbl::isCountable($val);
        $this->assertTrue($result);

        $val="string";
        $result=Vrbl::isCountable($val);
        $this->assertFalse($result);
    }*/
    
    
    public function testIsCallable()
    {
        $val=function () {
        };
        $result=Vrbl::isCallable($val);
        $this->assertTrue($result);
        
        $val="string";
        $result=Vrbl::isCallable($val);
        $this->assertFalse($result);
    }
    
    public function testGetType()
    {
        $val="string";
        $type=Vrbl::getType($val);
        $this->assertEquals("string", $type);
        
        $val=2.5;
        $type=Vrbl::getType($val);
        $this->assertEquals("double", $type);
        
        $val=1;
        $type=Vrbl::getType($val);
        $this->assertEquals("integer", $type);
        
        $val=true;
        $type=Vrbl::getType($val);
        $this->assertEquals("boolean", $type);
        
        $val=false;
        $type=Vrbl::getType($val);
        $this->assertEquals("boolean", $type);
        
        $val=new \DateTime();
        $type=Vrbl::getType($val);
        $this->assertEquals("object", $type);
        
        $val=null;
        $type=Vrbl::getType($val);
        $this->assertEquals("NULL", $type);
    }
    
    public function testSetType()
    {
        $val=1;
        $this->assertTrue(Vrbl::setType($val, "float"));
        $this->assertTrue(Vrbl::setType($val, "string"));
        $this->assertTrue(Vrbl::setType($val, "array"));
        $this->assertTrue(Vrbl::setType($val, "boolean"));
        $this->assertTrue(Vrbl::setType($val, "object"));
    }

    public function testPrintR()
    {
        $this->expectException(\InvalidArgumentException::class);
        Vrbl::printR("str",null);

        $val = Vrbl::printR("str",true);
        $this->assertTrue(Str::isString($val));
    }

    public function testRPrintR()
    {
        $this->expectException(\InvalidArgumentException::class);
        Vrbl::printR("str",null);

        $val = Vrbl::rPrintR("str",true);
        $this->assertTrue(Str::isString($val));
    }

    public function testVarExport()
    {
        $this->expectException(\InvalidArgumentException::class);
        Vrbl::varExport("str",null);

        $val = Vrbl::varExport("str",true);
        $this->assertTrue(Str::isString($val));
    }
}
