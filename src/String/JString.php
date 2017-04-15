<?php
namespace JavaPhp\String;

use JavaPhp\Exception\StringIndexOutOfBoundsException;
use PhpCollection\Sequence;

/**
 * Class JString A Java like String for php
 * @package JavaPhp\String
 */
class JString
{
    
    /**
     * @var string the inner string for the wrapper class
     */
    protected $inner = "";
    
    /**
     * JString constructor. pass a string in to create a new instance
     *
     * @param $string
     */
    function __construct($string)
    {
        $this->inner = $string;
    }
    
    /**
     * Returns true if, and only if, length() is 0
     *
     * @return bool rue if length() is 0, otherwise false
     */
    function isEmpty()
    {
        return empty($this->inner);
    }
    
    /**
     * Returns the length of this string. The length is equal to the number of Unicode code units in the string.
     *
     * @return int length in interface CharSequence
     */
    function length()
    {
        return strlen($this->inner);
    }
    
    /**
     * Returns the char value at the specified index. An index ranges from 0 to length() - 1.
     * The first char value of the sequence is at index 0, the next at index 1, and so on, as for array indexing.
     * If the char value specified by the index is a surrogate, the surrogate value is returned.
     *
     * @param int $index the index of the char value.
     *
     * @return string the char value at the specified index of this string. The first char value is at index 0.
     * @throws StringIndexOutOfBoundsException
     */
    function charAt(int $index)
    {
        if ($index < 0 || $index >= $this->length())
            throw new StringIndexOutOfBoundsException($index);
        return $this->inner{$index};
    }
    
    /**
     * Compares this string to the specified object.
     * The result is true if and only if the argument is not null and is a
     * String object that represents the same sequence of characters as this object.
     *
     * @param mixed $anObject The object to compare this String against
     *
     * @return bool true if the given object represents a String equivalent to this string, false otherwise
     */
    function equals($anObject)
    {
        return $this->inner == $anObject;
    }
    
    /**
     * Compares this String to another String, ignoring case considerations. Two strings are considered equal ignoring
     * case if they are of the same length and corresponding characters in the two strings are equal ignoring case.
     *
     * @param string $anotherString The String to compare this String against
     *
     * @return bool true if the argument is not null and it represents an equivalent String ignoring case; false
     *              otherwise
     */
    function equalsIgnoreCase($anotherString)
    {
        return strcasecmp($this->inner, $anotherString) == 0;
    }
    
    /**
     * Compares two strings lexicographically.
     *
     * @param string $aotherString the String to be compared.
     *
     * @return int the value 0 if the argument string is equal to this string; a value less than 0 if this string is
     *             lexicographically less than the string argument; and a value greater than 0 if this string is
     *             lexicographically greater than the string argument.
     */
    function compareTo($aotherString)
    {
        return strcmp($this->inner, $aotherString);
    }
    
    /**
     * Compares two strings lexicographically, ignoring case differences
     *
     * @param string $otherString the String to be compared.
     *
     * @return int a negative integer, zero, or a positive integer as the specified String is greater than, equal to,
     *             or less than this String, ignoring case considerations.
     */
    function compareToIgnoreCase($otherString)
    {
        return strcasecmp($this->inner, $otherString);
    }
    
    /**
     * Tests if the substring of this string beginning at the specified index starts with the specified prefix.
     *
     * @param string $prefix  the prefix.
     * @param int    $toffset where to begin looking in this string.
     *
     * @return bool true if the character sequence represented by the argument is a prefix of the substring of this
     *              object starting at index toffset; false otherwise. The result is false if toffset is negative or
     *              greater than the length of this String object; otherwise the result is the same as the result of
     *              the expression
     */
    function startsWith($prefix, int $toffset = 0)
    {
        if ($toffset < 0 || $toffset > strlen($this->inner))
            return false;
        return substr($this->inner, $toffset, strlen($prefix)) == $prefix;
    }
    
    /**
     * Tests if this string starts with the specified prefix ignoring case.
     *
     * @param string $prefix the prefix.
     * @param int    $toOffset
     *
     * @return bool rue if the character sequence represented by the argument is a prefix of the substring of this
     *              object starting at index toffset; false otherwise.
     */
    function startsWithIgnoreCase($prefix, int $toOffset = 0)
    {
        if ($toOffset < 0 || $toOffset > strlen($this->inner))
            return false;
        return strcasecmp(substr($this->inner, $toOffset, strlen($prefix)), $prefix) == 0;
    }
    
    /**
     * Tests if this string ends with the specified suffix.
     *
     * @param string $suffix the suffix.
     *
     * @return bool true if the character sequence represented by the argument is a suffix of the character sequence
     *              represented by this object; false otherwise.
     */
    function endsWith($suffix)
    {
        return substr($this->inner, strlen($this->inner) - strlen($suffix), strlen($suffix)) == $suffix;
    }
    
    /**
     * Tests if this string ends with the specified suffix ignoring case
     *
     * @param string $suffix the suffix.
     *
     * @return bool true if the character sequence represented by the argument is a suffix of the character sequence
     *              represented by this object; false otherwise.
     */
    function endsWithIgnoreCase($suffix)
    {
        return strcasecmp(substr($this->inner, strlen($this->inner) - strlen($suffix), strlen($suffix)), $suffix) == 0;
    }
    
    /**
     * Returns the index within this string of the first occurrence of the specified character.
     *
     * @param int|string $ch pass an integer to compare character codes. Pass a string to call strpos
     *
     * @return int the index of the first occurrence of the character or string in the character sequence. -1 is
     *             returned if the character or string does not occur
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
     * Returns the index within this string of the last occurrence of the specified character
     *
     * @param int|string $ch pass an integer to compare character codes. Pass a string to call strpos
     *
     * @return int he index of the last occurrence of the character in the character sequence. -1 is returned if the
     *             character or string does not occur
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
     * Returns a string that is a substring of this string. The substring begins with the character at the specified
     * index and extends to the end of this string.
     *
     * @param int  $beginIndex the beginning index, inclusive.
     * @param int  $endIndex   the ending index, exclusive, or if $useLength is set to true, it is the characters
     *                         to advance
     * @param bool $useLength  set to true in order to use the $endIndex as a length instead of a ending location.
     *
     * @return JString the specified substring
     * @throws StringIndexOutOfBoundsException
     */
    function substring($beginIndex, $endIndex = -1, $useLength = false)
    {
        // the length of the inner string is stored here in order to reduce the use of the strlen function
        $length = strlen($this->inner);
        if ($beginIndex < 0 || $beginIndex >= $length)
            throw new StringIndexOutOfBoundsException($beginIndex);
        if ($endIndex == -1)
            return new JString(substr($this->inner, $beginIndex));
        
        if ($useLength) {
            if ($beginIndex + $endIndex > $length || $endIndex < 0)
                throw new StringIndexOutOfBoundsException($beginIndex + $endIndex);
            return new JString(substr($this->inner, $beginIndex, $endIndex));
        }
        
        if ($endIndex < $beginIndex || $endIndex > $length)
            throw new StringIndexOutOfBoundsException($endIndex);
        return new JString(substr($this->inner, $beginIndex, $endIndex - $beginIndex));
    }
    
    /**
     * Concatenates the specified string to the end of this string.
     *
     * @param string $str he String that is concatenated to the end of this String.
     *
     * @return JString a string that represents the concatenation of this object's characters followed by the string
     *                 argument's characters.
     */
    function concat($str)
    {
        return new JString($this->inner . $str);
    }
    
    /**
     * Tells whether or not this string matches the given regular expression.
     *
     * @param string $regex The regular expression to which this string is to be matched.
     *
     * @return bool true if, and only if, this string matches the given regular expression.
     */
    function matches($regex)
    {
        return (boolean)preg_match($regex, $this->inner);
    }

    /**
     * Gets a collection of matches using the given regex expression.
     *
     * @param string $regex The regular expression to match against
     *
     * @return Sequence The collection of matches strings
     */
    function match($regex)
    {
        $matches = [];
        preg_match($regex, $this->inner, $matches);
        return new Sequence($matches);
    }
    
    /**
     * Returns true if and only if this string contains the specified sequence of char values.
     *
     * @param string $str the sequence to search for
     *
     * @return bool true if this string contains s, false otherwise
     */
    function contains($str)
    {
        return strpos($this->inner, $str) !== false;
    }
    
    /**
     * Returns true if and only if this string contains the specified sequence of char values ignoring case.
     *
     * @param string $str the sequence to search for ignoring case
     *
     * @return bool true if this string contains s ignoring case, false otherwise
     */
    function containsIgnoreCase($str)
    {
        return stripos($this->inner, $str) !== false;
    }
    
    /**
     * Replaces the first substring of this string that matches the given regular expression with the given replacement.
     *
     * @param string $regex       the regular expression to which this string is to be matched
     * @param string $replacement the string to be substituted for the first match
     *
     * @return JString The resulting String
     */
    function replaceFirst($regex, $replacement)
    {
        return new JString(preg_replace($regex, $replacement, $this->inner, 1));
    }
    
    /**
     * Replaces each substring of this string that matches the given regular expression with the given replacement.
     *
     * @param string $regex       the regular expression to which this string is to be matched
     * @param string $replacement the string to be substituted for each match
     *
     * @return JString The resulting String
     */
    function replaceAll($regex, $replacement)
    {
        return new JString(preg_replace($regex, $replacement, $this->inner));
    }
    
    /**
     * Replaces each substring of this string that matches the literal target sequence with the specified literal
     * replacement sequence. The replacement proceeds from the beginning of the string to the end, for example,
     * replacing "aa" with "b" in the string "aaa" will result in "ba" rather than "ab".
     *
     * @param string $target      The sequence of char values to be replaced
     * @param string $replacement The replacement sequence of char values
     *
     * @return JString The resulting string
     */
    function replace($target, $replacement)
    {
        return new JString(str_replace($target, $replacement, $this->inner));
    }
    
    /**
     * Splits this string around matches of the given regular expression.
     *
     * @param string $regex the delimiting regular expression
     * @param int    $limit the result threshold, as described above
     *
     * @return string[] the array of strings computed by splitting this string around matches of the given regular
     *                  expression
     */
    function split($regex, $limit = -1)
    {
        return preg_split($regex, $this->inner, $limit);
    }
    
    /**
     * Returns a new String composed of copies of the CharSequence elements joined together with a copy of the
     * specified delimiter.
     *
     * @param string   $delimiter the delimiter that separates each element
     * @param string[] $elements  the elements to join together.
     *
     * @return JString a new String that is composed of the elements separated by the delimiter
     */
    function join($delimiter, $elements)
    {
        return new JString(implode($delimiter, $elements));
    }
    
    /**
     * Converts all of the characters in this String to lower case
     *
     * @return JString the String, converted to lowercase.
     */
    function toLowerCase()
    {
        return new JString(strtolower($this->inner));
    }
    
    /**
     * Converts all of the characters in this String to upper case
     *
     * @return JString the String, converted to uppercase.
     */
    function toUpperCase()
    {
        return new JString(strtoupper($this->inner));
    }
    
    /**
     * Returns a string whose value is this string, with any leading and trailing whitespace removed. If a $charlist is
     * provided, that will be used instead of whitespace.
     *
     * @param string $charlist
     *
     * @return JString A string whose value is this string, with any leading and trailing white space removed
     */
    function trim($charlist = " \t\n\r\0\x0B")
    {
        return new JString(trim($this->inner, $charlist));
    }
    
    /**
     * Converts this string to a new string array of each character
     *
     * @return string[] a newly allocated string array
     */
    function toCharArray()
    {
        return str_split($this->inner);
    }
    
    //TODO: Implement format function
    
    /**
     * Returns the string representation of the Object argument.
     *
     * @param mixed $var an Object.
     *
     * @return JString the resulting string
     */
    static function valueOf($var)
    {
        return new JString(strval($var));
    }
    
    /**
     * @return string
     */
    function __toString()
    {
        return $this->inner;
    }
    
}