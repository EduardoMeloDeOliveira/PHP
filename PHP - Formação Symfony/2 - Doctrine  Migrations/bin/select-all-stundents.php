<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

$studentEntity = Student::class;

$repository = $entityManager->getRepository($studentEntity);


/**@var Student[] $students */
$students = $repository->studentsAndCourses();

foreach ($students as $student) {

    $name = $student->getName();

    echo "Id: $student->id\n";
    echo "Nome: $name\n";

    echo implode(',', $student->getPhones()
            ->map(fn(Phone $phone) => $phone->number)
            ->toArray()) . "\n";
    echo implode(',' , $student->getCourses()
        ->map(fn(Course $course)=>$course->title)
        ->toArray()) . "\n";

}
