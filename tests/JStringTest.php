<?php
use JavaPhp\String\JString;

/**
 * @mixin TestCase
 * Class JStringTest
 */
class JStringTest extends PHPUnit_Framework_TestCase
{
    
    function testIsEmpty()
    {
        $string = new JString("");
        self::assertEquals(true, $string->isEmpty());
    }
    
    function testLength()
    {
        $string = new JString("hi");
        self::assertEquals(2, $string->length());
    }
    
    function testCharAt()
    {
        $string = new JString("a");
        self::assertEquals('a', $string->charAt(0));
    }
    
    /**
     * @expectedException \JavaPhp\Exception\StringIndexOutOfBoundsException
     */
    function testCharAtOutOfBounds()
    {
        $string = new JString("a");
        $string->charAt(1);
    }
    
    function testToCharArray()
    {
        $string = new JString("hi");
        $chars = $string->toCharArray();
        self::assertEquals(['h', 'i'], $chars);
    }
    
    function testCompareTo()
    {
        $string = new JString("A");
        $string2 = new JString("C");
        self::assertEquals(-1, $string->compareTo($string2));
    }
    
    function testCompareToIgnoreCase()
    {
        $string = new JString("A");
        self::assertEquals(0, $string->compareToIgnoreCase('a'));
    }
    
    function testStartsWith()
    {
        $string = new JString("A Person");
        self::assertTrue($string->startsWith('A'));
    }
    
    function testStartsWithIgnoreCaseTrue()
    {
        $string = new JString("A Person");
        self::assertTrue($string->startsWithIgnoreCase('a'));
    }
    
    function testStartsWithIgnoreCaseFalse()
    {
        $string = new JString("A Person");
        self::assertFalse($string->startsWithIgnoreCase('b'));
    }
    
    function testEndsWith()
    {
        $string = new JString("A Fox");
        self::assertTrue($string->endsWith('Fox'));
    }
    
    function testEndsWithIgnoreCase()
    {
        $string = new JString("A Fox");
        self::assertTrue($string->endsWithIgnoreCase('fox'));
    }
    
    function testIndexOfInt()
    {
        $string = new JString("B");
        self::assertEquals(0, $string->indexOf(66));
    }
    
    function testIndexOfString()
    {
        $string = new JString("B");
        self::assertEquals(0, $string->indexOf("B"));
    }
    
    function testLastIndexOfInt()
    {
        $string = new JString("AB");
        self::assertEquals(1, $string->lastIndexOf(66));
    }
    
    function testLastIndexOfString()
    {
        $string = new JString("AB");
        self::assertEquals(1, $string->lastIndexOf("B"));
    }
    
    function testSubstringStarting()
    {
        $string = new JString("AB");
        self::assertEquals("B", $string->substring(1));
    }
    
    function testSubstringSection()
    {
        $string = new JString("A fox jumped over the fence");
        self::assertEquals("fence", $string->substring(22, 27));
    }
    
    function testSubstringLength()
    {
        $string = new JString("A fox jumped over the fence");
        self::assertEquals("fence", $string->substring(22, 5, true));
    }
    
    function testMatches() {
        $string = new JString("Hello");
        self::assertTrue($string->matches('/ello/'));
    }
    function testMatchesFalse() {
        $string = new JString("Hello");
        self::assertFalse($string->matches('/bleh/'));
    }
    function testContains() {
        $string = new JString("A fox jumped over the fence");
        self::assertTrue($string->contains("fox"));
    }
    function testContainsIgnoreCase() {
        $string = new JString("A fox jumped over the fence");
        self::assertTrue($string->containsIgnoreCase("Fox"));
    }
    
    function testValueOf()
    {
        self::assertTrue(is_string((string)JString::valueOf("hello")));
    }
    
    function testConcatenation() {
        self::assertEquals("hello world", new JString("hello") . new JString(" world"));
    }
    
    function testToString()
    {
        $string = new JString("test");
        self::assertEquals(true, is_string((string)$string));
    }
    
    function testFunctionality() {
        $str = new JString("DATE: 09-08-1994");
        $twoString = $str->split('/\s+/');
        $test = "";
    }
  
    
    
}