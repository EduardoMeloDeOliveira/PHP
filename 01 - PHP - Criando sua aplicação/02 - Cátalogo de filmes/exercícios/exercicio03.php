<?php

// 3 - Elabore um programa em PHP que receba um valor em metros e converta para centímetros.


function toCentimeter(float $meters): float
{
    return $meters * 100;
}

$centimetros = toCentimeter(1);

echo "\n$centimetros cm";