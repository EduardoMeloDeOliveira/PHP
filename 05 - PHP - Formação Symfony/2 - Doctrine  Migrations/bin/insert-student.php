<?php

use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";


$entityManager =EntityManagerCreator::createEntityManager();

$studend = new \Alura\Doctrine\Entity\Student($argv[1]);

$studend->setPhones(new \Alura\Doctrine\Entity\Phone("(11)987654321)"));
$studend->setPhones(new \Alura\Doctrine\Entity\Phone("(11)987654221)"));

$entityManager->persist($studend);
$entityManager->flush();