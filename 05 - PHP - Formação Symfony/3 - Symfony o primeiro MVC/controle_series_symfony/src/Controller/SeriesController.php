<?php

namespace App\Controller;

use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SeriesController extends AbstractController
{
    #[Route('/series', name: 'app_series')]
    public function index(): Response
    {
        $serieList = [
            "Dois homens e meio",
            "Limtless",
            "Game of thrones"
        ];

//        return new JsonResponse($serieList);

        return $this->render("series/index.html.twig",
            [
                "controller_name" => "Lista de séries",
                "seriesList" => $serieList

            ]);
    }

    #[Route('/series/create', methods: ['GET'])]
    public function form():Response
    {
        return $this->render(view: "series/form.html.twig");
    }
}
