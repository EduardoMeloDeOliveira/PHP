<?php

namespace App\DTO;

class SeriesCreateFormInput
{

    public function __construct(
        private ?string $seriesName = null,
        private ?int    $seasonsQuantity = null,
        private  ?int    $episodesPerSeason = null
    )
    {

    }

    public function getSeriesName(): ?string
    {
        return $this->seriesName;
    }

    public function setSeriesName(?string $seriesName): void
    {
        $this->seriesName = $seriesName;
    }

    public function getSeasonsQuantity(): ?int
    {
        return $this->seasonsQuantity;
    }

    public function setSeasonsQuantity(?int $seasonsQuantity): void
    {
        $this->seasonsQuantity = $seasonsQuantity;
    }

    public function getEpisodesPerSeason(): ?int
    {
        return $this->episodesPerSeason;
    }

    public function setEpisodesPerSeason(?int $episodesPerSeason): void
    {
        $this->episodesPerSeason = $episodesPerSeason;
    }



}