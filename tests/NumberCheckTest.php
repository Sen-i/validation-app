<?php
require("index.php");

use PHPUnit\Framework\TestCase;

class NumberCheckTest extends TestCase
{
    public function testNumberCheck_Null()
    {
        $expected = false;
        $input = '';
        $result = numberCheck($input);

        $this->assertEquals($expected, $result);
    }

    public function testNumberCheck_Valid()
    {
        $expected = true;
        $input = '4406283776';
        $result = numberCheck($input);

        $this->assertEquals($expected, $result);
    }

    public function testNumberCheck_InvalidShort()
    {
        $expected = false;
        $input = '123456';
        $result = numberCheck($input);

        $this->assertEquals($expected, $result);
    }

    public function testNumberCheck_InvalidNotNumber()
    {
        $expected = false;
        $input = '12312312S1';
        $result = numberCheck($input);

        $this->assertEquals($expected, $result);
    }

    public function testNumberCheck_Valid1()
    {
        $expected = true;
        $input = '4277608332';
        $result = numberCheck($input);

        $this->assertEquals($expected, $result);
    }

    public function testNumberCheck_InValidLong()
    {
        $expected = false;
        $input = '12312312312';
        $result = numberCheck($input);

        $this->assertEquals($expected, $result);
    }

    public function testNumberCheck_InValidRecurringNumber()
    {
        $expected = false;
        $input = '2222222222';
        $result = numberCheck($input);

        $this->assertEquals($expected, $result);
    }

    public function testNumberCheck_Valid2()
    {
        $expected = true;
        $input = '2185273756';
        $result = numberCheck($input);

        $this->assertEquals($expected, $result);
    }

    public function testNumberCheck_InValidNegativeNumber()
    {
        $expected = false;
        $input = '-875123699';
        $result = numberCheck($input);

        $this->assertEquals($expected, $result);
    }

    public function testValidate_InValidFloatNumber()
    {
        $expected = false;
        $input = '58751236.9';
        $result = numberCheck($input);

        $this->assertEquals($expected, $result);
    }

}