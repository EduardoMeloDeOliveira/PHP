<?php



function isGretherThanEigthteen(int $age): string
{

    if ($age <= 17) {
        return "menor de idade";
    }

    return "maior de idade";

}


$idade = 19;

$isMaiorDeIdade = isGretherThanEigthteen($idade);

echo "$isMaiorDeIdade";