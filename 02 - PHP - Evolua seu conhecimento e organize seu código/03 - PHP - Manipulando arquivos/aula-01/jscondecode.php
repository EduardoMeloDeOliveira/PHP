<?php


// json_encode(dado , true) : transforma dado/arquivo array em um json

// json_decode(dado,true) : transforma dado/arquivo json em um array

// JSON = javaScript object notation

$arrayFilmeToJSON = [
    "filme" => [
        "nome" => "Limitless",
        "ano" => 2011,
        "genero" => "Drama"
    ]
];


$json = json_encode($arrayFilmeToJSON,true);

echo "$json";


$jsonDecode = json_decode($json,true);


print_r($jsonDecode);
