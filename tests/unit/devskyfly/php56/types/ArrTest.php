<?php
namespace devskyfly\php56\types;

class ArrTest extends \Codeception\Test\Unit
{
    public $assoc_array=["a"=>"text 1","b"=>"text 2", "c"=>"text 3", "d"=>"text 4"];

    public $array=["element 1","element 2","element 3","element 4","element 5"];
    
    public $array_with_double_elements=["element 1","element 2","element 2","element 3","element 4","element 5"];
    
    public $hash_table_array=[
        ["name"=>'Str 1',"value"=>1],
        ["name"=>"Str 3","value"=>3],
        ["name"=>"Str 2","value"=>2],
    ];
    
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

    
    public function testIsArray()
    {
        $val="";
        $this->assertTrue(Arr::isArray($this->array));
        $this->assertTrue(Arr::isArray($this->assoc_array));
        $this->assertFalse(Arr::isArray($val));
    }
    
    public function testGetSize()
    {
        $val="";
        $this->assertTrue(count($this->array)==Arr::getSize($this->array));
        $this->assertTrue(count($this->assoc_array)==Arr::getSize($this->assoc_array));
        $this->assertFalse((count($this->assoc_array)+1)==Arr::getSize($this->assoc_array));
        $this->expectException(\InvalidArgumentException::class);
        Arr::getSize($val);
    }
    
    public function testCountValues()
    {
        $val=Arr::countValues($this->array_with_double_elements);
        $this->assertTrue($val["element 2"]==2);
        
        $this->expectException(\InvalidArgumentException::class);
        Arr::countValues("");
    }
     
    public function testGetChunked()
    {
        $result=Arr::getChunked($this->assoc_array, 2);
        $cnt=Arr::getSize($result);
        $this->assertTrue($cnt==2);
        
        $this->expectException(\InvalidArgumentException::class);
        $result=Arr::getChunked("", 2);
        
        $this->expectException(\InvalidArgumentException::class);
        $result=Arr::getChunked($this->assoc_array, 0.2);
        
        $this->expectException(\InvalidArgumentException::class);
        $result=Arr::getChunked($this->assoc_array, 2, "");
    }
    
    public function testGetColumn()
    {
        $column=Arr::getColumn($this->hash_table_array, "name");
        $this->assertTrue(Arr::getSize($column)==3);
        
        $column=Arr::getColumn($this->hash_table_array, "_name");
        $this->assertTrue(Arr::getSize($column)==0);
    }
    
    public function testIndexByColumn()
    {
        $result=Arr::indexByColumn($this->hash_table_array, "value");
        $cnt=self::getSize($result);
        
        for ($i=1;$i<=$cnt;$i++) {
            $this->assertTrue($item[$i]["value"]==$i);
            $i++;
        }
        
        $this->expectException(\InvalidArgumentException::class);
        $result=Arr::indexByColumn($this->hash_table_array, true);
    }

    public function testKeyExists()
    {
        $this->assertTrue(Arr::keyExists($this->assoc_array, 'a'));
        $this->assertFalse(Arr::keyExists($this->assoc_array, 'f'));

        $this->expectException(\InvalidArgumentException::class);
        $this->assertTrue(Arr::keyExists(1, 'a'));
        $this->expectException(\InvalidArgumentException::class);
        $this->assertTrue(Arr::keyExists($this->assoc_array, new Obj()));
    }

    public function testColumnExists()
    {
        $this->assertTrue(Arr::columnExists($this->hash_table_array, "name"));
        $this->assertFalse(Arr::columnExists($this->hash_table_array, "name1"));

        $this->expectException(\InvalidArgumentException::class);
        Arr::columnExists($this->hash_table_array, "name");
        $this->expectException(\InvalidArgumentException::class);
        Arr::columnExists(1, new Obj());
    }

    public function testGetCombined()
    {
        $keys = ["a", "b", "c", "d"];
        $values = [];

        for ($i=1;$i<=4; $i++) {
            $values[] = "text {$i}";
        }

        $arr = Arr::getCombined($keys, $values);

        $this->assertEquals(Arr::getSize($arr), 4);

        foreach ($arr as $key => $val) {
            $this->assertTrue(Arr::keyExists($this->assoc_array, $key));
            $this->assertEquals($this->assoc_array[$key], $val);
        }
    }
}
