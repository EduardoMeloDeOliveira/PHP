<?php



$filme = [
    "filme" => "Limitless",
     "ano" => 2022,
     "genero" => "Drama"
];

$filmeJson = json_encode($filme);

file_put_contents(__DIR__ . "/filmes.json", $filmeJson);

//coloque o conteúdo no diretório raiz desse arquivo (aula-02), chame-o de "filmes.json"...
    //... e o conteúdo que será passado é a variável $filmeJson;
    