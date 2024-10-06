<?php

namespace App\Controller;

use App\Entity\Series;
use App\Form\SeriesType;
use App\Repository\SeriesRepository;
use Doctrine\ORM\EntityManager;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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


        return $this->render("series/index.html.twig",
            [
                "controller_name" => "Lista de séries",
                "seriesList" => $serieList,


            ]);
    }

    #[Route('/series/create-form', name: 'app_redirect_create_form', methods: ['GET'])]
    public function rediretAddSeriesForm(): Response
    {
        $form = $this->createForm(SeriesType::class, new Series());

        return $this->render("series/form.html.twig", [
            "controller_name" => "Adicione uma nova série",
            "formulario" => $form,
            "button_name" => "Adicionar"

        ]);

    }

    #[Route('/series/create-form', name: 'app_create_series', methods: ['POST'])]
    public function addSerie(Request $request): Response
    {
        $serie = new Series();
        $form = $this->createForm(SeriesType::class, $serie)
            ->handleRequest($request);

        if (!$form->isValid()) {
            return $this->render("series/form.html.twig",
                ["formulario" => $form,
                    "controller_name" => "Adicionar série",
                ]);
        }

        $this->repository->save($serie);

        $this->addFlash('success', "Série {$serie->getName()} foi adicionada com sucesso");

        return new RedirectResponse("/series", 201);
    }

    #[Route("/series/{id}", name: 'app_delete_series', methods: ['DELETE'])]
    public function deleteSerie(int $id, Request $request): Response
    {
        $serie = $this->repository->findOneById($id);


        if ($serie) {
            $serieName = $serie->getName();
            $this->repository->remove($serie);
            $this->addFlash('success', "A série {$serieName} foi removida com sucesso!");
            return new RedirectResponse("/series", 201);

        }

        $this->addFlash('error', 'Série não encontrada');
        return new RedirectResponse("/series", 404);

    }

    #[Route('/series/edit-form/{series}', name: 'app_redirect_edit_form', methods: ['GET'])]
    public function rediretcToEditSeriesForm(Series $series): Response
    {
        $form = $this->createForm(SeriesType::class, $series,['is_edit' => true]);
        return $this->render("series/form.html.twig",
            [
                'series' => $series,
                'controller_name' => 'Editar série',
                'formulario' => $form,
                "button_name" => "Editar"

            ]);
    }

    #[Route('/series/edit-form/{series}', name: 'app_edit_series', methods: ['PUT'])]
    public function editForm(Request $request, Series $series): Response
    {

        $form = $this->createForm(SeriesType::class, $series,['is_edit' => true]);
        $form->handleRequest($request);

        if(!$form->isValid()){
            return $this->render("series/form.html.twig",
                [
                    'series' => $series,
                    'controller_name' => 'Editar série',
                    'formulario' => $form,
                    "button_name" => "Editar"

                ]);
        }

        $serieFinded = $this->repository->findOneById($series->getId());


        if ($serieFinded != null) {
            $serieFinded->setName($series->getName());
            $this->repository->save($serieFinded);
            $this->addFlash('success', "Série {$serieFinded->getName()} foi editada com sucesso!");
            return new RedirectResponse("/series");
        }


        return new RedirectResponse("/series");


    }
}
