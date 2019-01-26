<?php

class Person
{
    /**
     * Person's full name
     *
     * @var string
     */
    private $_name;

    /**
     * Person's job title
     *
     * @var string
     */
    private $_job;

    /**
     * Person's age number
     *
     * @var int
     */
    private $_age;

    /**
     * Person's college degree
     *
     * @var string
     */
    private $_degree;

    /**
     * Sets required properties whenever was instantiated
     *
     * @param string $name
     * @param string $job
     * @param integer $age
     * @param string $degree
     */
    public function __construct(string $name, string $job, int $age, string $degree)
    {
        $this->_name = $name;
        $this->_job = $job;
        $this->_age = $age;
        $this->_degree = $degree;

    }

    /**
     * Get infomration
     *
     * @return string
     */
    public function getDetails()
    {
        return "Name : $this->_name, Job : $this->_job, Age : $this->_age, Degree : $this->_degree ";

    }

}

$amir = new Person('amir', 'doctor', 38, 'master');
print_r($amir);
