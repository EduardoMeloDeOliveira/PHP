<?php


// 2 - Crie um programa que, a partir de altura e peso, calcule o IMC e exiba a classificação do IMC.

function imcCalculator(float $peso, float $altura): float
{

    return $peso / $altura ** 2;

}


$imcResult = imcCalculator(90.0, 1.83);

if ($imcResult >= 40) {
    echo "Obesidade grau III";
} else if ($imcResult >= 35.0 && $imcResult <= 39.9) {
    echo "Obesidade grau II";
} else if ($imcResult >= 30.0 && $imcResult <= 34.9) {
    echo "Obesidade grau I";
} else if ($imcResult >= 25.0 && $imcResult <= 29.9) {
    echo "Sobrepeso";
} else if ($imcResult >= 18.6 && $imcResult <= 24.9) {
    echo "Normal";
} else {
    echo "Abaixo do normal";
}

