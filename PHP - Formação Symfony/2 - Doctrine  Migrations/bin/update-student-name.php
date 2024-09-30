<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager =EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

$studenUploaded = $studentRepository->find($argv[1]);

$studenUploaded->setName($argv[2]);

$entityManager->persist($studenUploaded);
$entityManager->flush();