<?php

namespace App\Controller;

use App\Entity\Series;
use App\Repository\SeasonRepository;
use App\Repository\SeriesRepository;
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

        $season = $series->getSeason();

        return $this->render('seasons/index.html.twig', [
            'controller_name' => "Temporadas da série: {$series->getName()}" ,
            'seasons' => $season,
            'series_name' => $series->getName()
        ]);
    }
}
