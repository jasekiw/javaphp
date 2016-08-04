<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 8/4/2016
 * Time: 12:07 AM
 */

namespace JavaPhp\String;

use JavaPhp\Exception\StringIndexOutOfBoundsException;

class JString
{
    
    protected $inner = "";
    
    function __construct($string)
    {
        $this->inner = $string;
    }
    
    function isEmpty()
    {
        return empty($this->inner);
    }
    
    /**
     * @return int
     */
    function length()
    {
        return strlen($this->inner);
    }
    
    function charAt(int $index)
    {
        if ($index < 0 || $index >= $this->length())
            throw new StringIndexOutOfBoundsException($index);
        return $this->inner{$index};
    }
    
   
    
    function equalsIgnoreCase(string $notherString)
    {
        return strcasecmp($this->inner, $notherString) == 0;
    }
    
    function compareTo(string $otherString)
    {
        return strcmp($this->inner, $otherString);
    }
    
    function compareToIgnoreCase(string $otherString)
    {
        return strcasecmp($this->inner, $otherString);
    }
    
    function startsWith(string $prefix, int $toffset = 0)
    {
        return substr($this->inner, $toffset, strlen($prefix)) == $prefix;
    }
    
    function startsWithIgnoreCase(string $prefix, int $toffset = 0)
    {
        return strcasecmp(substr($this->inner, $toffset, strlen($prefix)), $prefix) == 0;
    }
    
    function endsWith(string $suffix)
    {
        return substr($this->inner, strlen($this->inner) - strlen($suffix), strlen($suffix)) == $suffix;
    }
    
    function endsWithIgnoreCase(string $suffix)
    {
        return strcasecmp(substr($this->inner, strlen($this->inner) - strlen($suffix), strlen($suffix)), $suffix) == 0;
    }
    
    /**
     * Gets the index postition of the character or string
     *
     * @param int|string $ch pass an integer to compare character codes. Pass a string to call strpos
     *
     * @return int -1 is returned if the index is not found.
     */
    function indexOf($ch)
    {
        if (is_int($ch)) {
            $search = chr($ch);
            $result = strpos($this->inner, $search);
            return $result === false ? -1 : $result;
        } else if (is_string($ch)) {
            $result = strrpos($this->inner, $ch);
            return $result === false ? -1 : $result;
        }
        return -1;
    }
    
    /**
     * Gets the last index postition of the character or string
     *
     * @param int|string $ch pass an integer to compare character codes. Pass a string to call strpos
     *
     * @return int -1 is returned if the index is not found.
     */
    function lastIndexOf($ch)
    {
        if (is_int($ch)) {
            $search = chr($ch);
            $result = strrpos($this->inner, $search);
            return $result === false ? -1 : $result;
        } else if (is_string($ch)) {
            $result = strrpos($this->inner, $ch);
            return $result === false ? -1 : $result;
        }
        return -1;
    }
    
    /**
     * @param int  $beginIndex The starting location of the substring
     * @param int  $endIndex   The index to stop the substring at or if $useLength is set to true, it is the characters
     *                         to advance
     * @param bool $useLength  set to true in order to use the $endIndex as a length instead of a ending location.
     *
     * @return string
     * @throws StringIndexOutOfBoundsException
     */
    function substring(int $beginIndex, int $endIndex = -1, bool $useLength = false)
    {
        $length = strlen($this->inner);
        if ($beginIndex < 0 || $beginIndex >= $length)
            throw new StringIndexOutOfBoundsException($endIndex);
        if ($endIndex == -1) {
            return new JString(substr($this->inner, $beginIndex));
        } else {
            if ($useLength) {
                if ($beginIndex + $endIndex > $length || $endIndex < 0)
                    throw new StringIndexOutOfBoundsException($beginIndex + $endIndex);
                return new JString(substr($this->inner, $beginIndex, $endIndex));
            } else {
                if ($endIndex < $beginIndex || $endIndex > $length)
                    throw new StringIndexOutOfBoundsException($endIndex);
                return new JString(substr($this->inner, $beginIndex, $endIndex - $beginIndex));
            }
        }
    }
    
    function concat(string $str)
    {
        return new JString($this->inner . $str);
    }
    
    function matches(string $regex)
    {
        return (boolean)preg_match($regex, $this->inner);
    }
    
    function contains(string $str)
    {
        return strpos($this->inner, $str) !== false;
    }
    
    function containsIgnoreCase(string $str)
    {
        return stripos($this->inner, $str) !== false;
    }
    
    function replace(string $oldString, string $newString)
    {
        return new JString(str_replace($oldString, $newString, $this->inner));
    }
    
    function replaceFirst(string $regex, string $replacement)
    {
        return new JString(preg_replace($regex, $replacement, $this->inner, 1));
    }
    
    function replaceAll(string $regex, string $replacement)
    {
        return new JString(preg_replace($regex, $replacement, $this->inner));
    }
    
    function split(string $regex, int $limit = -1)
    {
        return preg_split($regex, $this->inner, $limit);
    }
    
    function toLowerCase() {
        return new JString(strtolower($this->inner));
    }
    function toUpperCase() {
        return new JString(strtoupper($this->inner));
    }
    
    function trim($charlist = " \t\n\r\0\x0B") {
        trim($this->inner, $charlist);
    }
    
    /**
     * @return string[] array
     */
    function toCharArray()
    {
        return str_split($this->inner);
    }
    
    static function valueOf($var)
    {
        return new JString(strval($var));
    }
    
    function __toString()
    {
        return $this->inner;
    }
    
}