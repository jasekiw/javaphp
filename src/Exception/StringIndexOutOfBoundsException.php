<?php
namespace JavaPhp\Exception;

use Exception;

/**
 * Class StringIndexOutOfBoundsException
 * @package JavaPhp\Exception
 */
class StringIndexOutOfBoundsException extends Exception
{
    
    /**
     * StringIndexOutOfBoundsException constructor.
     *
     * @param string $index The charcter index that is out of bounds
     */
    function __construct($index)
    {
        parent::__construct('String index out of range: ' . $index);
    }
}