<?php

namespace lab1\classes;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Employee
{
    protected $id;
    protected $name;
    protected $salary;
    protected $joinDate;
    public function __construct($id, $name, $salary, $joinDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->joinDate = $joinDate;
    }
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint(
            'id',
            new Assert\PositiveOrZero()
        );
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint(
            'name',
            new Assert\Length(['min' => 3])
        );
        $metadata->addPropertyConstraint('salary', new Assert\NotBlank());
        $metadata->addPropertyConstraint(
            'salary',
            new Assert\PositiveOrZero()
        );
        $metadata->addPropertyConstraint('joinDate', new Assert\NotBlank());
        $metadata->addPropertyConstraint(
            'joinDate',
            new Assert\Date()
        );
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function getJoinTime()
    {
        return $this->joinDate;
    }

    public function getExperience()
    {
        $now = time();
        $datediff = $now - strtotime($this->joinDate);
        return floor($datediff / (60 * 60 * 24 * 365));
    }

    public function printInfo()
    {
        echo "id: {$this->id} name: {$this->name} salary: {$this->salary} joinDate: {$this->joinDate}\n";
    }
}
