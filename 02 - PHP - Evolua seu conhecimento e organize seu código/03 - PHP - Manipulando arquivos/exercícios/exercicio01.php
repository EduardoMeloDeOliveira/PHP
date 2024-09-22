<?php

// 1.Escreva um programa em PHP que abra um arquivo chamado teste.txt para ler a primeira linha e depois o fecha.

$relativePath = __DIR__ . "/teste.txt";
$getedFile = file_get_contents( $relativePath );

echo $getedFile;