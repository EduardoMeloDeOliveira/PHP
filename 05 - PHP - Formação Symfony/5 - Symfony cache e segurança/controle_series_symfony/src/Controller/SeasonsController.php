<?php

namespace App\Controller;

use App\Entity\Series;
use App\Repository\SeasonRepository;
use App\Repository\SeriesRepository;
use Doctrine\ORM\PersistentCollection;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Cache\ItemInterface;
use Twig\Cache\CacheInterface;

class SeasonsController extends AbstractController
{

    public function __construct(
        private SeasonRepository $seasonRepository,
        private CacheItemPoolInterface $cache)
    {

    }

    #[Route('/seasons/{series}', name: 'app_seasons_redirect_info')]
    public function index(Series $series): Response
    {
        $season = $this->cache->get(
            "series_{$series->getId()}_season",
            function (ItemInterface $item) use ($series) {
                $item->expiresAfter(5);

                /** @var PersistentCollection $season */
                $season = $series->getSeason();
                $season->initialize();

                return $season;
            }
        );


        return $this->render('seasons/index.html.twig', [
            'controller_name' => "Temporadas da série: {$series->getName()}",
            'seasons' => $season,
            'series_name' => $series->getName()
        ]);
    }
}
