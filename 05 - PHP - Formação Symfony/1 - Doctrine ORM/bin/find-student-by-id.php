<?php

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = \Alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(\Alura\Doctrine\Entity\Student::class);


/** @var  $student */
$student = $studentRepository->find($argv[1]);
$name = $student->getName();
echo "$student->id\n$name";