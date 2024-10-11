<?php

namespace App\DTO;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

class SeriesCreateFormInput
{

    public function __construct(
        #[Assert\Assert\NotBlank()]
        #[Assert\Length(min: 3)]
        private ?string $seriesName = null,

        #[Assert\Positive]
        private ?int    $seasonsQuantity = null,

        #[Assert\Positive]
        private ?int    $episodesPerSeason = null,

        #[Assert\File]
        public ?File $coverImage = null
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