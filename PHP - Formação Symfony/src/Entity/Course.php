<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;

#[Entity]
class Course
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;

    #[ManyToMany(targetEntity: Student::class,mappedBy: 'courses')]
    private Collection $student;

    public function __construct
    (
        #[Column]
        public readonly string $title,
    )
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getStudent(): Collection
    {
        return $this->student;
    }

    public function setStudent(Student $student): void
    {
        if($this->student->contains($student)) {
            return;
        }

        $this->student->add($student);
        $student->enrollInCourse($this);
    }


}