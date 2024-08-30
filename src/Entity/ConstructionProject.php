<?php

namespace App\Entity;

use App\Repository\ConstructionProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstructionProjectRepository::class)]
class ConstructionProject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 6, unique: true)]
    private string $projectId;

    #[ORM\Column(type: 'string', length: 200)]
    private string $name;

    #[ORM\Column(type: 'string', length: 500)]
    private string $location;

    #[ORM\Column(type: 'string', length: 50)]
    private string $stage;

    #[ORM\Column(type: 'string', length: 50)]
    private string $category;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $otherCategory = null;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $startDate;

    #[ORM\Column(type: 'text', length: 2000)]
    private string $description;

    #[ORM\Column(type: 'integer')]
    private int $creatorId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getProjectId(): string
    {
        return $this->projectId;
    }

    public function setProjectId(string $projectId): self
    {
        $this->projectId = $projectId;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getStage(): string
    {
        return $this->stage;
    }

    public function setStage(string $stage): self
    {
        $this->stage = $stage;
        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function getOtherCategory(): string
    {
        return $this->otherCategory;
    }

    public function setOtherCategory(string $otherCategory): self
    {
        $this->otherCategory = $otherCategory;
        return $this;
    }

    public function getStartDate(): \DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getCreatorId(): string
    {
        return $this->creatorId;
    }

    public function setCreatorId(string $creatorId): self
    {
        $this->creatorId = $creatorId;
        return $this;
    }
}
