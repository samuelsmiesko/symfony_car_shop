<?php

namespace App\Entity;

use App\Repository\NewNumbersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewNumbersRepository::class)]
class NewNumbers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $BlogNumber = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlogNumber(): ?int
    {
        return $this->BlogNumber;
    }

    public function setBlogNumber(?int $BlogNumber): static
    {
        $this->BlogNumber = $BlogNumber;

        return $this;
    }
}
