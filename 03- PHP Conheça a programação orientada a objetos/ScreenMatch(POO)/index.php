<?php

$filmeModel = __DIR__ . "/src/Model/Filme.php";
$serieModel = __DIR__ . "/src/Model/Serie.php";
$tituloModel = __DIR__ . "/src/Model/Titulo.php";
$enums = __DIR__ . "/src/Enums/GeneroEnum.php";
$calculator = __DIR__ .  "/src/Service/CalculadoraDeMaratona.php";

var_dump($tituloModel);

require_once $enums;
require_once $tituloModel;
require_once $filmeModel;
require_once $serieModel;
require_once $calculator;

$filme = new Filme("Limtless", 2011, GeneroEnum::Drama, 80);

print_r($filme);

$serie = new Serie("Two and half man", 2006, GeneroEnum::Comedia, 8, 20, 20);

$filme->avaliarTitulo(9.98);

print_r($filme);

print_r($serie);

$calculadora  = new CalculadoraDeMaratona();

$calculadora->inclui($filme);
$calculadora->inclui($serie);

    echo  $calculadora->getDuracaoEmMinutos();


