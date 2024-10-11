<?php

namespace App\Controller;

use App\Entity\Series;
use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SeasonsController extends AbstractController
{
    public function __construct(private SeasonRepository $seasonRepository)
    {
    }

    #[Route('/seasons/{series}', name: 'app_seasons_redirect_info')]
    public function index(Series $series): Response
    {
        $seasons = $series->getSeason();


        $seasons->initialize();

        $watchedEp = 0;
        $episodes = [];


        foreach ($seasons as $season) {
            $episodes = $season->getEpisode();
            foreach ($episodes as $episode) {
                if ($episode->getWatched()) {
                    $watchedEp++;
                }
            }
        }

        return $this->render('seasons/index.html.twig', [
            'controller_name' => "Temporadas da série: {$series->getName()}",
            'seasons' => $seasons,
            'series' => $series,
            'watched' => $watchedEp,
        ]);
    }
}
