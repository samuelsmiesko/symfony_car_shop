<?php

namespace App\Entity;

use App\Repository\CarsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarsRepository::class)]
class Cars
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $brandname = null;

    #[ORM\Column(length: 255)]
    private ?string $modelname = null;

    #[ORM\Column]
    private ?int $modelyear = null;

    #[ORM\Column(nullable: true)]
    private ?int $milage = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrandname(): ?string
    {
        return $this->brandname;
    }

    public function setBrandname(string $brandname): static
    {
        $this->brandname = $brandname;

        return $this;
    }

    public function getModelname(): ?string
    {
        return $this->modelname;
    }

    public function setModelname(string $modelname): static
    {
        $this->modelname = $modelname;

        return $this;
    }

    public function getModelyear(): ?int
    {
        return $this->modelyear;
    }

    public function setModelyear(int $modelyear): static
    {
        $this->modelyear = $modelyear;

        return $this;
    }

    public function getMilage(): ?int
    {
        return $this->milage;
    }

    public function setMilage(?int $milage): static
    {
        $this->milage = $milage;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
