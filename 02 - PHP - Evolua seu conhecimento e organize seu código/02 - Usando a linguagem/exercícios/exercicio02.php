<?php 

// 2.Crie um programa em PHP que transforme a string “Vinicius Dias,1997,Programador” em um array em que cada item está separado por vírgulas.


$nome = "Eduardo Melo De Oliveira,1997,Desenvolvedor back-end";

$array = [];

$array[] = explode(",", $nome);


var_dump($array);