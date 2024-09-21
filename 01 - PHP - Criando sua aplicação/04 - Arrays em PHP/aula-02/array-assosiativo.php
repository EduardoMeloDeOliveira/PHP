<?php

//contexto: filme


//exemplo de forEach

// $filmes = [1,2,3,4,5,6,7,8,9];


// foreach($filmes as $filme){
//     echo "$filme\n";
// }



$filmes = [
    [
        "nome" => "Limtless",
        "createdAt" => 2011,
        "nota" => 8.9,
        "genero" => "Drama"
    ],
    [
        "nome" => "A volta dos que não foram",
        "createdAt" => 2000,
        "nota" => 7.6,
        "genero" => "Comédia"
    ],
];


foreach ($filmes as $key => $filmeDaVez) {


    print_r($filmeDaVez);
}