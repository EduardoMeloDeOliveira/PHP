<?php

// 3.Escreva uma função em PHP que receba um array de strings por parâmetro e o retorne ordenado em ordem alfabética


function sortStringArray(array $array): array{


sort($array);
return $array;
}

$frutas = ["figo", "uva" , "ameixa" , "banana"];

print_r(sortStringArray($frutas));

