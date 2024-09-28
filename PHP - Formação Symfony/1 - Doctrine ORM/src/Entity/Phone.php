<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Phone
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    public int $id;


    #[ManyToOne(targetEntity: Student::class)]
    public Student $student;
    public function __construct
    (
        #[Column] public readonly string $number
    )
    {

    }

    public function setStundent(Student $student):void
    {
        $this->student = $student;
    }

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }




}