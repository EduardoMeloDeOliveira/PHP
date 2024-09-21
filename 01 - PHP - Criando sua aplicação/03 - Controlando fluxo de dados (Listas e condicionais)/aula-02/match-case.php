<?php

//contexto : filme


$filmes = [
    [
        "nome" => "Limitless",
        "createdAt" => 2011
    ],

    [
        "nome" => "A volta dos que não foram",
        "cratedAt" => 2022
    ],

    [
        "nome" => "A ida dos que não voltaram",
        "cratedAt" => 2022
    ]
];


$generoReturn = match ($filmes[0]['nome']) {
    "Limitless" => "drama",
    "A volta dos que não foram" => "ação",
    "A ida dos que não voltaram" => "comédia",

    default => "gênero desconhecido"
};


echo "\n$generoReturn\n";
