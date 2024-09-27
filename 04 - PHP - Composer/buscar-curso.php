<?php

require __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/src/Buscador.php";

$client = new \GuzzleHttp\Client(['base_uri' => 'https://www.alura.com.br/',"verify" => false]);
$crawler = new \Symfony\Component\DomCrawler\Crawler();


$buscador = new \Alura\BuscadorCursos\Buscador($client, $crawler);

$cursos = $buscador->buscar("/cursos-online-programacao/golang");


foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}