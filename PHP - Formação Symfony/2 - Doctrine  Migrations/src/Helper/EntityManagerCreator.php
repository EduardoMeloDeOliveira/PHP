<?php

namespace Alura\Doctrine\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Cache\Adapter\PhpFilesAdapter;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

class EntityManagerCreator
{

    public static function createEntityManager(): EntityManager
    {
        $cacheDirectorty = __DIR__ . "/../../var/cache/";

        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . "/../../src"],
            isDevMode: true,
        );

        $config->setMiddlewares([
            new Middleware(new ConsoleLogger(new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG))),
        ]);

        $config->setMetadataCache(new PhpFilesAdapter(
            namespace: 'metadata_cache',
            directory: $cacheDirectorty
        ));

        $config->setQueryCache(new PhpFilesAdapter(
            namespace: 'query_cache',
            directory: $cacheDirectorty
        ));

        $config->setResultCache(new PhpFilesAdapter(
            namespace: 'result_cache',
            directory: $cacheDirectorty
        ));

        $connection = DriverManager::getConnection([
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '1033',
            'dbname' => 'estudantes',
            'host'=> 'localhost',
            'port' => '3306',
        ], $config);

        return $entityManager = new EntityManager($connection, $config);

    }

}