<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);


/** @var  $student */
$student = $studentRepository->find($argv[1]);
$name = $student->getName();
echo "$student->id\n$name";