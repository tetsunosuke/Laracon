<?php
/**
 */

use LaravelJpCon\tetsunosukeq1\Calculator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Error\Warning;


/**
 * Class CalculatorTest
 */
class CalculatorTest extends TestCase
{
    private $obj;

    public function setUp()
    {
        $this->obj = new Calculator();
    }

    public function testAdd()
    {
        $this->assertEquals(3, $this->obj->add(1,2));
        $this->assertEquals(0, $this->obj->add(1,-1));
    }

    public function testDivide()
    {
        // int/int でもdouble を返します 
        $this->assertEquals(0.5, $this->obj->divide(1,2));
        $this->assertEquals(-1, $this->obj->divide(1,-1));
    }

    /**
     * 例外のテスト
     */
    public function testDivideHasWarningOnDividedByZero()
    {
        $this->expectException(Warning::class);
        $this->expectExceptionMessage("Division by zero");
        $this->obj->divide(1, 0);
    }

    public function testFormat()
    {
        $this->assertEquals("10,000,000",   $this->obj->format("10000000"));
        // タイプヒントの挙動は設定次第
        $this->assertEquals("1,000",        $this->obj->format(1000));
        // 文字列は0として扱われる
        $this->assertEquals("0",            $this->obj->format("test"));
        // 16進ぽくても同じ
        $this->assertEquals("0",            $this->obj->format("beef"));
        // 後半の文字列が捨てられる
        $this->assertEquals("1,234",        $this->obj->format("1234test"));
        $this->assertEquals("1",            $this->obj->format("1-2-3-4"));

    }

}
