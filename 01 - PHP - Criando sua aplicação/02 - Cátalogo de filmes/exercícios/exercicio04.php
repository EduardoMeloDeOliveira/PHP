<?php

// 4 - Desenvolva um programa em PHP que verifique se um ano é bissexto ou não.


function isBissexto(int $year): bool
{

    if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
        return true;
    }

    return false;
}


$year = 2020;

$validYear = isBissexto($year);

if ($validYear === false) {
    echo "$year não é bissexto";
}

if ($validYear === true) {
    echo "$year é um ano bissexto";
}
