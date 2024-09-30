<?php

use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";


$entityManager = \Alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();

var_dump($entityManager);
