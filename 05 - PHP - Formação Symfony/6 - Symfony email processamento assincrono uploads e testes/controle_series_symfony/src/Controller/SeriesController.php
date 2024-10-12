<?php

namespace App\Controller;

use App\DTO\SeriesCreateFormInput;
use App\Entity\Episode;
use App\Entity\Season;
use App\Entity\Series;
use App\Form\SeriesType;
use App\Message\SeriesWasCreated;
use App\Message\SeriesWasDeleted;
use App\Repository\SeriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class SeriesController extends AbstractController
{

    public function __construct(private SeriesRepository    $repository,
                                private MailerInterface     $mailer,
                                private MessageBusInterface $messageBus,
                                private SluggerInterface    $slugger)
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
        $form = $this->createForm(SeriesType::class, new SeriesCreateFormInput());

        return $this->render("series/form.html.twig", [
            "controller_name" => "Adicione uma nova série",
            "formulario" => $form,

        ]);

    }

    #[Route('/series/create-form', name: 'app_create_series', methods: ['POST'])]
    public function addSerie(Request $request): Response
    {
        $input = new SeriesCreateFormInput();
        $form = $this->createForm(SeriesType::class, $input)
            ->handleRequest($request);

        $uploadedImage = $input->coverImage;
        $newFileName = null;

        if (!$form->isValid()) {
            return $this->render("series/form.html.twig", [
                "formulario" => $form,
                "controller_name" => "Adicionar série",
            ]);
        }

        $directory = $this->getParameter('cover_image_directory');

        if ($uploadedImage) {

            $originalFilename = pathinfo($uploadedImage->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFileName = $this->slugger->slug($originalFilename);
            $newFileName = $safeFileName . '-' . uniqid() . '.' . $uploadedImage->guessExtension();


            $uploadedImage->move($directory, $newFileName);
        }





        $serie = new Series($input->getSeriesName(), $newFileName);

        if (isset($newFileName)) {
            $serie->setCoverPath($newFileName);
        }


        for ($i = 1; $i <= $input->getSeasonsQuantity(); $i++) {
            $season = new Season($i);
            for ($j = 1; $j <= $input->getEpisodesPerSeason(); $j++) {
                $season->addEpisode(new Episode($j));
            }
            $serie->addSeason($season);
        }


        $this->repository->save($serie);

        $this->messageBus->dispatch(new SeriesWasCreated($serie));


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
            $this->messageBus->dispatch(new SeriesWasDeleted($serie));
            $this->addFlash('success', "A série {$serieName} foi removida com sucesso!");
            return new RedirectResponse("/series", 201);

        }

        $this->addFlash('error', 'Série não encontrada');
        return new RedirectResponse("/series", 404);

    }

    #[Route('/series/edit-form/{series}', name: 'app_redirect_edit_form', methods: ['GET'])]
    public function rediretcToEditSeriesForm(Series $series): Response
    {
        $input = new SeriesCreateFormInput();
        $input->setSeriesName($series->getName());
        $form = $this->createForm(SeriesType::class, $input, ['is_edit' => true]);
        return $this->render("series/form.html.twig",
            [
                'series' => $series,
                'controller_name' => 'Editar série',
                'formulario' => $form,

            ]);
    }

    #[Route('/series/edit-form/{series}', name: 'app_edit_series', methods: ['PUT'])]
    public function editForm(Request $request, Series $series): Response
    {

        $input = new SeriesCreateFormInput();
        $form = $this->createForm(SeriesType::class, $input, ['is_edit' => true]);
        $form->handleRequest($request);

        if (!$form->isValid()) {
            return $this->render("series/form.html.twig",
                [
                    'series' => $series,
                    'controller_name' => 'Editar série',
                    'formulario' => $form

                ]);
        }

        $serieFinded = $this->repository->findOneById($series->getId());


        if ($serieFinded != null) {
            $serieFinded->setName($input->getSeriesName());
            $this->repository->save($serieFinded);
            $this->addFlash('success', "Série {$serieFinded->getName()} foi editada com sucesso!");
            return new RedirectResponse("/series");
        }


        return new RedirectResponse("/series");


    }
}
