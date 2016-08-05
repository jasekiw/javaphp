<?php
/**
 * Implementation of the Java Integer object.
 * User: BNJHope
 * Date: 8/4/2016
 * Time: 12:07 AM
 */

namespace JavaPhp\Integer;

class JInteger {

  /**
   * The value of this instance of the JInteger.
   * @var int
   */
  private $value;

  //FIELDS

  //TODO : Implement BYTES, SIZE and TYPE

  /**
   * From the Oracle Documentation on Java 8 https://docs.oracle.com/javase/8/docs/api/java/lang/Integer.html
   * "A constant holding the maximum value an int can have, 2^31 - 1."
   * @var int
   */
  public static $MAX_VALUE = pow(2, 31) - 1;

  /**
   * From the Oracle Documentation on Java 8 https://docs.oracle.com/javase/8/docs/api/java/lang/Integer.html
   * "A constant holding the minimum value an int can have, -2^31."
   * @var int
   */
  public static $MIN_VALUE = -1 * pow(2,31);


  //CONSTRUCTORS
  /**
   * Constructor for the JInteger
   * @param int | string $value The value of this instance of a JInteger.
   */
  public function __construct($value) {

    /**
     * @var string
     * The keyword used by PHP that returns from the gettype function
     * if the parameter handed to it is an integer.
     */
    define("integerKeyword", "integer");

    /**
    * @var string
    * The keyword used by PHP that returns from the gettype function
    * if the parameter handed to it is an string.
     */
    define("stringKeyword", "string");

    /**
     * Set the value of this instance of a JInteger depending on the type
     * of the value passed to the constructor.
     */
    switch(gettype($value)) {

          //if its an integer, set the value of this instance as the raw integer
          //passed to it.
          case integerKeyword :
              $this->value = $value;
              break;

          //if it is a string, set the value of this instance as the converted string
          //passed to it.
          case stringKeyword :
              $this->value = intval($value);
              break;
    }
  }

}
