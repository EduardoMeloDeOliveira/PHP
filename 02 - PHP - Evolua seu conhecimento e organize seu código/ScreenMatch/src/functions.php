<?php

function constructFilme(string $nome, int $lancamento,float $nota, string $genero):array{


    return [
        "nome" => $nome,
        "anoDeLancamento" => $lancamento,
        "nota" => $nota,
        "genero" => $genero
    ];

}

$filme = constructFilme("Limitless" , 2011, 8.7,"drama");


print_r($filme);


