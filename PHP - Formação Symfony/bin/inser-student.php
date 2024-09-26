<?php
require_once __DIR__ . "/../vendor/autoload.php";


$entityManager = \Alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();

$studend = new \Alura\Doctrine\Entity\Student("Eduardo Melo de Oliveira");

$entityManager->persist($studend);
$entityManager->flush();