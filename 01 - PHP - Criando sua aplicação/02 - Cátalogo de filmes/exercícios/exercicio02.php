<?

// 2 - Crie um programa em PHP que calcule a média de três notas e exiba o resultado.

function calcMedia(float $nota1, float $nota2, float $nota3): float
{
    return ($nota1 + $nota2 + $nota3) / 3;

}


$media = calcMedia(10.0,9.5,8.9);

echo "\n$media";