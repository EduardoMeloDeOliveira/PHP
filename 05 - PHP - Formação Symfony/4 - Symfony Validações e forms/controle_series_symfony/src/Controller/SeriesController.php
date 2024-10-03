<?php

namespace App\Controller;

use App\Entity\Series;
use App\Repository\SeriesRepository;
use Doctrine\ORM\EntityManager;
use phpDocumentor\Reflection\Types\Integer;
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

    #[Route('/series', name: 'app_series')]
    public function index(Request $request): Response
    {
        $serieList = $this->repository->findAll();
        $session = $request->getSession();
        $success = $session->get('success');
        $error = $session->get('error');
        $session->remove('success');
        $session->remove('error');



        return $this->render("series/index.html.twig",
            [
                "controller_name" => "Lista de séries",
                "seriesList" => $serieList,
                "successMessage" => $success,
                "errorMessage" => $error

            ]);
    }

    #[Route('/series/create', name: 'app_create', methods: ['GET'])]
    public function form(): Response
    {

        return $this->render("series/form.html.twig", [
            "controller_name" => "Adicione uma nova série",
        ]);

    }


    #[Route('/series/create', name: 'app_create_series', methods: ['POST'])]
    public function addSerie(Request $request): Response
    {
        $getFromInput = $request->request->get('seriesName');
        $serie = new Series($getFromInput);
        $serieName = $serie->getName();

        $this->repository->save($serie);
        $session = $request->getSession();
        $session->set('success', "Série {$serieName} foi adicionada com sucesso");

        return new RedirectResponse("/series", 201);
    }

    #[Route("/series/{id}", name: 'app_delete_series', methods: ['DELETE'])]
    public function deleteSerie(int $id, Request $request): Response
    {
        $serie = $this->repository->findOneById($id);
        $session = $request->getSession();


        if ($serie) {
            $serieName = $serie->getName();
            $this->repository->remove($serie);
            $session->set('success', "A série {$serieName} foi removida com sucesso!");
            return new RedirectResponse("/series", 201);

        }

        $session->set('error', 'Série não encontrada');
        return new RedirectResponse("/series", 404);



    }
}
