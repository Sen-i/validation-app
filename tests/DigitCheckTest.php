<?php

use \PHPUnit\Framework\TestCase;

class DigitCheckTest extends TestCase
{
    public function testDigitCheck_Invalid0()
    {
        $expected = false;
        $input = '7834204230';
        $result = digitCheck($input);

        $this->assertEquals($expected, $result);
    }

    public function testDigitCheck_Invalid1()
    {
        $expected = false;
        $input = '7593613361';
        $result = digitCheck($input);

        $this->assertEquals($expected, $result);
    }

    public function testDigitCheck_Invalid5()
    {
        $expected = false;
        $input = '9660240675';
        $result = digitCheck($input);

        $this->assertEquals($expected, $result);
    }
}