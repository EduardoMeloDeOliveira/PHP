<?php


//some um valor usando a quantidade de parametros que foram passados para tirar a média


$listaDeNotas = [10, 9.7, 6.7, 8.9, 9.9];

$somaDasNotas = 0.0;

for ($i = 0; $i < count($listaDeNotas); $i++) {

    $somaDasNotas += $listaDeNotas[$i];

}

$mediaDasNotas = $somaDasNotas / count($listaDeNotas);


echo $mediaDasNotas;

