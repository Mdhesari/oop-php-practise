<?php

interface test
{

    public function printOut();
    public function writeDown();
}

interface test2
{
    function getOut();
    function getUp();
}

// Valid class for mimplement
class myClass implements test
{

    // for print
    public function printOut()
    {
        echo "that was printed...";
    }

    // for write
    public function writeDown()
    {
        return "wrote down...";
    }

}

// Valid interface
class MyOtherClass implements test2
{
    public function getOut()
    {
        return "stand up and get up...";
    }

}
