<?php

namespace Alura\Doctrine\Entity;

use Alura\Doctrine\Repository\DoctrineStudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity(repositoryClass: DoctrineStudentRepository::class)]
class Student
{

    #[Id]
    #[GeneratedValue(strategy: "AUTO")]
    #[Column]
    public int $id;


    #[ManyToMany(targetEntity: Course::class, inversedBy: "students", fetch: 'EAGER')]
    private Collection $courses;

    #[OneToMany(targetEntity: Phone::class, mappedBy: "student",cascade: ["persist","remove"],fetch: 'EAGER')]
    private Collection $phones;

    public function __construct(

        #[Column]
        private string $name,
    )
    {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**@return  Collection<Phone> */
    public function getPhones(): Collection
    {
        return $this->phones;
    }


    public function setPhones(Phone $phones): void
    {
        $this->phones[] = $phones;
        $phones->setStundent($this);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function setCourses(Collection $courses): void
    {
        $this->courses = $courses;
    }


    public function enrollInCourse(Course $course)
    {
        if($this->courses->contains($course)) {
            return;
        }

        $this->courses->add($course);
        $course->setStudent($this);
    }

}