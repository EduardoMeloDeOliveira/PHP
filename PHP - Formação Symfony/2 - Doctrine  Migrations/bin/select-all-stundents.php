<?php

use Alura\Doctrine\Entity\Student;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = \Alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

/**@var Student[] $students */
$students = $studentRepository->findAll();

foreach ($students as $student) {

    $name = $student->getName();

    echo "Id: $student->id\n";
    echo "Nome: $name\n";

    echo implode(',', $student->getPhones()
            ->map(fn(\Alura\Doctrine\Entity\Phone $phone) => $phone->number)
            ->toArray()) . "\n\n";
    echo implode(',' , $student->getCourses()
        ->map(fn(\Alura\Doctrine\Entity\Course $course)=>$course->title)
        ->toArray()) . "\n\n";


}