<?php

namespace App\Controller;

use App\Entity\Season;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EpisodesController extends AbstractController
{

    public function __construct(private EntityManagerInterface $entityManager)
    {

    }

    #[Route('/episodes/{seasonId}', name: 'app_episodes_redirect', methods: ['GET'])]
    public function index(Season $seasonId): Response
    {
        return $this->render('episodes/index.html.twig', [
            'controller_name' => "Episódios da temporada {$seasonId->getNumber()} da série {$seasonId->getSeries()->getName()}",
            'season' => $seasonId,
            'series' => $seasonId->getSeries(),
            'episodes' => $seasonId->getEpisode()
        ]);
    }


    #[Route('/episodes/{seasonId}', name: 'app_episode_watch', methods: ['POST'])]
    public function saveWatched(Season $seasonId, Request $request)
    {
        $watchedEp = array_keys($request->get('episodes'));
        $episodes = $seasonId->getEpisode();


        foreach ($episodes as $episode) {
            //marque como assistido caso o id do do episódio esteja dentro do array de watchdEp
          $episode->setWatched(in_array($episode->getId(), $watchedEp));
        }

        $this->entityManager->flush();

        return new RedirectResponse("/episodes/{$seasonId->getId()}");
    }
}
