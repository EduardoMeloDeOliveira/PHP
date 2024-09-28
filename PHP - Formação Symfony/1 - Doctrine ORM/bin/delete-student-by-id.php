<?php

use Alura\Doctrine\Entity\Student;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = \Alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

$student = $studentRepository->find($argv[1]);

$entityManager->remove($student);
$flush = $entityManager->flush();