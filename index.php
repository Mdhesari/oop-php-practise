<?php
/**
 * Shape Class for evaluating type of shapes
 * @author Mohammad Hesari <mdhesari99@gmail.com>
 * @copyright 2019 Nimckat
 * @license GNU GPLv3
 */

namespace SHAPE;
class Shape
{
    /**
     * A public variable
     *
     * @var string stores data for the class
     */
    protected $size;

    /**
     * Sets a new value for $size
     *
     * @param integer $size
     * @return void
     */
    public function __construct($size = 1)
    {
        $this->size = $size;
        echo __CLASS__ . "\n";
    }

    /**
     * Destroys class as soon as workflow is done
     *
     * @return void
     */
    public function __destruct()
    {
        die("\n \n !!!!End");
    }

    public function setProperty($size)
    {
        $this->size = $size;

    }

    public function getProperty()
    {
        echo $this->size . ']';

    }

    public function __toString()
    {
        echo 'using string method';
        return $this->getProperty();
    }
}

class circle extends Shape
{
    public function __construct($size = 1)
    {
        parent::__construct($size);

    }

    public function sum()
    {
        return (int) $this->size + (int) $this->size;
    }
}

// Instantiate
/* $myshape = new Shape;
unset($myshape);
$myshapee = 'hi';
echo $myshapee . 'end of file'; */

$myCircle = new circle;
echo $myCircle->sum();
