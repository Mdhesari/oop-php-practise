<?php
trait contact
{
    public function getNumber()
    {
        return '+989123434543';
    }

    public function countNumber()
    {
        $ret = "12";
        return $ret;
    }
}

class Person
{
    use contact;
    /**
     * Full name of user
     *
     * @var string
     */
    private $fullname;

    /**
     * International code [country]
     *
     * @var int
     */
    private $national_id;

    /**
     * License in order to use app
     *
     * @var string
     */
    private $license;

    public function __construct($fullname, $national_id, $license)
    {
        $this->fullname = $fullname;
        $this->national_id = $national_id;
        $this->license = $license;
    }
}

$mohmd = new Person("mohammad", "developer", 17, "bachelor");
