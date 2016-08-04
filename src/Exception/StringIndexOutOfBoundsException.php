<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 8/4/2016
 * Time: 12:42 AM
 */

namespace JavaPhp\Exception;



use Exception;

class StringIndexOutOfBoundsException extends Exception
{
    function __construct($index)
    {
        parent::__construct('String index out of range: ' . $index);
    }
}