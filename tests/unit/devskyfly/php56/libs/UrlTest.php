<?php
namespace devskyfly\php56\libs;

class UrlTest extends \Codeception\Test\Unit
{
    // tests
    public function testGenerateQuery()
    {
        $data = [
            "a" => "str1",
            "b" => "str2"
        ];
        $result = Url::generateQuery($data);
        $this->assertEquals($result,"a=str1&b=str2");
        
        $data[]="str3";
        $data[]="str4";

        $result = Url::generateQuery($data, 'skyfly_');
        $this->assertEquals($result, "a=str1&b=str2&skyfly_0=str3&skyfly_1=str4");

        $result = Url::generateQuery($data, 'skyfly_', "#");
        $this->assertEquals($result, "a=str1#b=str2#skyfly_0=str3#skyfly_1=str4");

        $this->expectException(\InvalidArgumentException::class);
        $result = Url::generateQuery($data, 1);

        $this->expectException(\InvalidArgumentException::class);
        $result = Url::generateQuery($data, "skyfly_", 1);
    }
}