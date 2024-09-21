<?php

//contexto:filme

//inserindo informações num array

$notas = [1,2,3,4,5,6,7,8,99,29312,222312,32131];

$notas2 = [];



foreach($notas as $iterator => $notaDaVez){

    $notas2[$iterator] = $notaDaVez;


    echo $notas2[$iterator] .  "\n" ;
}


//pegando tamanho da lista dinamicamente pro for tradicional


for($i = 0; $i < count($notas2); $i++){

    echo $notas2[$i] .  "\n";
}

// // mesmo resulatado com o forEach
// foreach($notas2 as $notaDaVez){

//     echo $notaDaVez . "\n";
// }