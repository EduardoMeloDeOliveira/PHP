<?php


// 5 - Escreva um programa em PHP que converta uma temperatura de Celsius para Fahrenheit.


function celciusToFahrenheit(float $celcius): float
{

    return $celcius * 1.8 + 32;

}


$fahrenheit = celciusToFahrenheit(30);


echo $fahrenheit;