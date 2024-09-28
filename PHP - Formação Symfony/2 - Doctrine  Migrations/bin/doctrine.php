<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = \Alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();



ConsoleRunner::run(
    new SingleManagerProvider($entityManager),

);