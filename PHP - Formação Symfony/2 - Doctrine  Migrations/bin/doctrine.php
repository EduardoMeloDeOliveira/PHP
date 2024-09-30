<?php

use Alura\Doctrine\Helper\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();



ConsoleRunner::run(
    new SingleManagerProvider($entityManager),

);