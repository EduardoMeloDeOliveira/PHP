<?php

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = \Alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(\Alura\Doctrine\Entity\Student::class);

$studenUploaded = $studentRepository->find($argv[1]);

$studenUploaded->setName($argv[2]);

$entityManager->persist($studenUploaded);
$entityManager->flush();