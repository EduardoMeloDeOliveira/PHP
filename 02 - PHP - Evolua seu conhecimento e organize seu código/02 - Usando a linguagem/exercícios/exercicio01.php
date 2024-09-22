<?php


// 1.Escreva um programa em PHP que inicialize um array de notas e exiba somente as 3 maiores notas do array.


$notas = [20,10,9,4,5100,100,9,90];

sort($notas);


echo $notas[count($notas) - 1] . "\n" . $notas[count($notas) - 2] . "\n" . $notas[count($notas) - 3];


