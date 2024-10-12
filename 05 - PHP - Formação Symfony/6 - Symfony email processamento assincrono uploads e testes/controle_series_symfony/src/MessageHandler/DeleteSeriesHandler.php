<?php

namespace App\MessageHandler;
use App\Message\SeriesWasDeleted;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class DeleteSeriesHandler
{

    public function __construct(private ParameterBagInterface $parameterBag)
    {
    }

    public function __invoke(SeriesWasDeleted $messageEvent)
{
    $coverPath = $messageEvent->series->getCoverPath();
    unlink($this->parameterBag->get('cover_image_directory') . '/' . $coverPath);

}
}