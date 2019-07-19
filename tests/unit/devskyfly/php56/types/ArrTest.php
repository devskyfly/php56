<?php
namespace devskyfly\php56\types;

use devskyfly\php56\libs\arr\Keys;
use devskyfly\php56\libs\arr\Diff;

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

    public function testCreateArrayUsingKeysAndValues()
    {
        $keys = ["a", "b", "c", "d"];
        $value = "banana";

        $arr = Arr::createArrayUsingKeysAndValues($keys, $value);
        $this->assertEquals(Arr::getSize($arr), 4);

        foreach ( $arr as $key => $val) {
            $this->assertTrue(Arr::inArray($key, $keys));
            $this->assertTrue($val==$value);
        }

        $this->expectException(\InvalidArgumentException::class);
        $arr = Arr::createArrayUsingKeysAndValues(1, $value);
    }

    public function testCreateArrayByRange()
    {
        $arr = Arr::createArrayByRange(1,10);
        $this->assertEquals(Arr::getSize($arr),10);
        $arr = Arr::createArrayByRange(1,10,2);
        $this->assertEquals(Arr::getSize($arr),5);
        $this->expectException(\InvalidArgumentException::class);
        $arr = Arr::createArrayByRange("",10);
        $this->expectException(\InvalidArgumentException::class);
        $arr = Arr::createArrayByRange(1,"");
        $this->expectException(\InvalidArgumentException::class);
        $arr = Arr::createArrayByRange(1,10,"");
    }

    public function testCreateFilledByValue()
    {
        $fill_val = "banana";
        $arr = Arr::createFilledByValue(1,10, $fill_val);
        $this->assertEquals(Arr::getSize($arr), 10);

        foreach ($arr as $val) {
            $this->assertTrue($fill_val==$val);
        }
        $this->expectException(\InvalidArgumentException::class);
        $arr = Arr::createFilledByValue("1", 10, $fill_val);
        $this->expectException(\InvalidArgumentException::class);
        $arr = Arr::createFilledByValue(1, "10", $fill_val);
    }

    public function testGetFiltered()
    {

        $callback = function ($val) {
            if ($val["value"] > 2) {
                return true;
            }
            return false;
        };
        $this->expectException(\InvalidArgumentException::class);
        $arr = Arr::getFiltered(null, $callback);
        $this->expectException(\InvalidArgumentException::class);
        $arr = Arr::getFiltered($this->hash_table_array, null);

        $arr = Arr::getFiltered($this->hash_table_array, $callback);
        $this->assertEquals(Arr::getSize($arr), 1);
        $this->assertTrue($arr[0]["value"]==3);
    }

    public function testGetFliped()
    {
        $this->expectException(\InvalidArgumentException::class);
        $arr = Arr::getFliped(null);

        $arr = Arr::getFliped($this->assoc_array);
        
        $keys = Keys::getKeys($this->assoc_array);
        $values = Arr::getValues($this->assoc_array);

        $arr_keys = Keys::getKeys($arr);
        $arr_values = Arr::getValues($arr);

        $diff1 = Diff::getDifference($keys,$arr_values);
        $diff2 = Diff::getDifference($values,$arr_keys);

        $this->assertTrue(Vrbl::isEmpty($diff1));
        $this->assertTrue(Vrbl::isEmpty($diff2));
    }

    public function testMap()
    {
        $callback = function ($val) {
            $val["value"] = $val["value"]*2;
            return $val;
        };

        $arr = Arr::map($callback, $this->hash_table_array);
        $this->assertTrue(Arr::getSize($arr)==Arr::getSize($this->hash_table_array));

        $limit = Arr::getSize($arr);
        for ($i=0;$i<$limit;$i++) {
            $assert = $this->hash_table_array[$i]['value']*2==$arr[$i]["value"];
            $this->assertTrue($assert);
        }
    }
}
