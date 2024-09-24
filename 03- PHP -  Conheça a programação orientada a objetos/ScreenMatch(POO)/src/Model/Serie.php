<?php


$relativePath = __DIR__ . "/../Enums/GeneroEnum.php";
require_once $relativePath;

class Serie extends Titulo
{

    public function __construct
    (
        string              $nome,
        int                 $anoLancamento,
        GeneroEnum          $genero,
        private int         $temporadas,
        public readonly int $episodioPorTemporadas,
        public readonly int $minutosPorEpisodio
    )
    {
        parent::__construct($nome, $anoLancamento, $genero);
    }

    public function avaliarTitulo($notas)
    {
        parent::avaliarTitulo($notas);
    }


    public function calculoDeMedia($notas): float
    {
        return parent::calculoDeMedia($notas);
    }

    public function calcularDuracaoCompleta(): int
    {
        return $this->temporadas * $this->episodioPorTemporadas * $this->minutosPorEpisodio;
    }


}