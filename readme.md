#Java Php Library

##overview
This library is a java like library that encapsulates all of php's global functions for base types.

JString is the first class built. many will be added

### JString

JString is a class that encapsulates all string funcitons into an object

ex.
```Php
$test = JString::valueOf(" hello ");
$fixed = $test->trim();
$result = $fixed->toUpperCase();
echo $result; // 'HELLO'
```