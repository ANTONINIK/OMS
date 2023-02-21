<?php

namespace lab1\classes;

class Department
{
    protected $employees;
    protected $name;

    public function __construct($employees, $name)
    {
        $this->employees = $employees;
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function salariesAmount()
    {
        $sum = 0;
        foreach ($this->employees as $employee) {
            $sum += $employee->getSalary();
        }
        return $sum;
    }

    public function employeesAmount()
    {
        return count($this->employees);
    }

    public function printInfo()
    {
        foreach ($this->employees as $employee) {
            $employee->printInfo();
        }
    }
}
