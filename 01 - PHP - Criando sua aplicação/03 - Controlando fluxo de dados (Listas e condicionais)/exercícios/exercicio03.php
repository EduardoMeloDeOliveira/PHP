<?php

// 3 - Desenvolva um programa que exiba na tela uma saudação (bom dia, boa tarde ou boa noite) dependendo do horário encontrado em uma variável (inteiro representando as horas)



$horas = 7;



if($horas > 5 && $horas <= 11){
    echo "Bom dia!";
}


if($horas > 11 && $horas <= 18){
    echo "Boa tarde!";
}

if($horas > 18 && $horas <= 24){
    echo "Boa noite";
}


if($horas > 24){
    echo "Ta na disney amigão?";
}