<?php

namespace App\MessageHandler;
use App\Message\SeriesWasCreated;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;


#[AsMessageHandler]
class LogNewSeriesHandler
{
public function __construct(private LoggerInterface $logger)
{
}

public function __invoke(SeriesWasCreated $messageEvent)
{
    $this->logger->info("Nova série criada" , ["série" => $messageEvent->series->getName()]);
}

}