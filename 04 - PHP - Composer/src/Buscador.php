<?php

namespace Alura\BuscadorCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{

    /**@var ClientInterface*/
    private $httpClient;

    /**@var Crawler*/
    private $crawler;

    public function __construct(ClientInterface $httpClient,Crawler $crawler){
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;

    }

    public function buscar(string $url):array
    {
        $cursos = [];
        $resposta = $this->httpClient->request('GET', $url);
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);

        $elementosCursos = $this->crawler->filter('span.card-curso__nome');

        foreach ($elementosCursos as $cursoDaVez){
            $cursos[]= $cursoDaVez->textContent;
        }

        return $cursos;
    }


}