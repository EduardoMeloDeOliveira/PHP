<?php

use Alura\Doctrine\Entity\Student;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = \Alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

/**@var Student[] $students*/
$students = $studentRepository->findAll();

foreach ($students as $student){

    $name = $student->getName();

    echo "Id: $student->id\n";
    echo "Nome: $name\n\n";
}