<?php

namespace App\Controller;

use App\Entity\Series;
use App\Repository\SeriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SeriesController extends AbstractController
{

    public function __construct(private SeriesRepository $repository)
    {

    }

    #[Route('/', name: 'app_series')]
    public function index(): Response
    {
        $serieList = $this->repository->findAll();

//        return new JsonResponse($serieList);

        return $this->render("series/index.html.twig",
            [
                "controller_name" => "Lista de séries",
                "seriesList" => $serieList

            ]);
    }

    #[Route('/series/create', methods: ['GET'])]
    public function form(): Response
    {

        return $this->render("series/form.html.twig", [
            "controller_name" => "Adicione uma nova série",
        ]);

    }


    #[Route('/series/create', methods: ['POST'])]
    public function addSerie(Request $request): Response
    {
        $getFromInput = $request->request->get('seriesName');
        $serie = new Series($getFromInput);


        $this->repository->save($serie,true);

        return new RedirectResponse("/", 201);
    }
}
