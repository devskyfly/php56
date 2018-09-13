<?php
namespace devskyfly\php56\types;

class NumberTest extends \Codeception\Test\Unit
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

    public function testIsDouble()
    {
        $val=0.5;
        $this->assertTrue(Number::isDouble($val));
        $val=1;
        $this->assertFalse(Number::isDouble($val));
    }
    
    public function testIsInteger()
    {
        $val=1;
        $this->assertTrue(Number::isInteger($val));
        
        $val="str";
        $this->assertFalse(Number::isInteger($val));
    }
    
    public function testIsNan()
    {
        $val=NAN;
        $this->assertTrue(Number::isNan($val));
        
        $val=0.5;
        $this->assertFalse(Number::isNan($val));
        
        $this->expectException(\InvalidArgumentException::class);
        
        $val="string";
        Number::isNan($val);
    }

    public function testIsEqual()
    {
        $val_1=1;
        $val_2=1;
        
        $this->assertTrue(Number::isEqual($val_1, $val_2));
        
        $val_1=0.9;
        $val_2=0.9;
        
        $this->assertTrue(Number::isEqual($val_1, $val_2));
        
        $this->expectException(\InvalidArgumentException::class);
        
        $val_1="str";
        $val_2="str";
        
        Number::isEqual($val_1, $val_2);
    }

    public function testIsNumeric()
    {
        $val=1;
        $this->assertTrue(Number::isNumeric($val));
        
        $val=1.5;
        $this->assertTrue(Number::isNumeric($val));
        
        $val="1.5";
        $this->assertTrue(Number::isNumeric($val));
        
        $val="1.5 str";
        $this->assertFalse(Number::isNumeric($val));
        
        $val="str";
        $this->assertFalse(Number::isNumeric($val));
    }

    public function testToDouble()
    {
        $val="1.5";
        $this->assertTrue(Number::isEqual(Number::toDouble($val), 1.5));
        
        $val=1;
        $this->assertTrue(Number::isEqual(Number::toDouble($val), 1.0));
        
        $this->expectException(\InvalidArgumentException::class);
        
        $val="str";
        $result=Number::toDouble($val);
    }
    
    public function testToInt()
    {
        $val="1";
        $this->assertTrue(Number::isEqual(Number::toInteger($val), 1));
        
        $val=1;
        $this->assertTrue(Number::isEqual(Number::toInteger($val), 1.0));
        
        $this->expectException(\InvalidArgumentException::class);
        
        $val="str";
        $result=Number::toInteger($val);
    }
}