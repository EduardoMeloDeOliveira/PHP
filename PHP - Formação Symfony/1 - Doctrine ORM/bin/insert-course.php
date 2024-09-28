<?php

use Alura\Doctrine\Entity\Course;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = \Alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();

$course = new Course($argv[1]);

$entityManager->persist($course);
$entityManager->flush();