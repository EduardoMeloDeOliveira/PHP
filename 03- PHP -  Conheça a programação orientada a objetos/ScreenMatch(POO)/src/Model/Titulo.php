<?php


$relativePath = __DIR__ . "/../Enums/GeneroEnum.php";
require_once $relativePath;

class Titulo
{
    private array $notas;

    public function __construct
    (
        public readonly string     $nome,
        public readonly int        $anoLancamento,
        public readonly GeneroEnum $genero

    )
    {
        $this->notas = [];
    }


    public function avaliarTitulo($notas)
    {
        $this->notas[] = $notas;
    }


    public function calcularDuracaoCompleta():int
    {
        return 0;
    }

    public function calculoDeMedia($notas): float
    {
        $notasSum = 0;
        $notasLength = count($notas);

        foreach ($notas as $nota) {
            $notasSum += $nota;
        }

        return $notasSum/$notasLength;
    }


    public function getNome(): string
    {
        return $this->nome;
    }

    public function getAnoLancamento(): int
    {
        return $this->anoLancamento;
    }

    public function getGenero(): GeneroEnum
    {
        return $this->genero;
    }

    public function getNotas(): array
    {
        return $this->notas;
    }

    public function setNotas(array $notas): void
    {
        $this->notas = $notas;
    }


}