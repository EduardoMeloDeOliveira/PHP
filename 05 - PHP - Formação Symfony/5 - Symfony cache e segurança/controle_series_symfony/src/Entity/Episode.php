<?php

namespace App\Entity;

use App\Repository\EpisodeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpisodeRepository::class)]
class Episode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\ManyToOne(inversedBy: 'episode',cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Season $season = null;

    #[ORM\Column(nullable: true)]
    private ?bool $watched = null;

    public function __construct(
        #[ORM\Column]
        private ?int $number = null)
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): static
    {
        $this->season = $season;

        return $this;
    }

    public function isWatched(): ?bool
    {
        return $this->watched;
    }

    public function setWatched(?bool $watched): static
    {
        $this->watched = $watched;

        return $this;
    }

    public function getWatched(): ?bool
    {
        return $this->watched;
    }
}
