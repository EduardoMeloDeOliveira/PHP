<?php

// 2.Escreva um programa em PHP que abra o arquivo teste.txt, acrescente a frase "PHP é incrível!" no final do arquivo e depois o feche.

$relativePath = __DIR__ . "/teste.txt";

$file = fopen($relativePath,"a");

fwrite($file, "\n PHP é incrível");

fclose($file);  