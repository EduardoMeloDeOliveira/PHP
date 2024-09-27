<?php

$relativePath = __DIR__ . "/../Model/Titulo.php";
class CalculadoraDeMaratona
{
    private int $duracaoEmMinutos = 0 ;

    public function inclui(\Titulo $titulo): int
    {
    return $this->duracaoEmMinutos += $titulo->calcularDuracaoCompleta();
    }

    public function getDuracaoEmMinutos(): int
    {
        return $this->duracaoEmMinutos;
    }



}