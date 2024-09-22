<?php

$arrayFilmeToJSON = [ 
    "nome" => "Limtless",
    "ano" => 2011,
    "genero" => "Drama"
];

$filmeJson = json_encode($arrayFilmeToJSON);

file_put_contents(__DIR__ . "/filmes.json", $filmeJson);

