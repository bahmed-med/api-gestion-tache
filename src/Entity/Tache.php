<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TacheRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *          normalizationContext={"groups"={"tache:read"}},
 *          denormalizationContext={"groups"={"tache:write"}}
 * )
 * @ORM\Entity(repositoryClass=TacheRepository::class)
 */
class Tache
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("tache:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"tache:read", "tache:write"})
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"tache:read"})
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     * @Groups({"tache:read", "tache:write"})
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"tache:read"})
     */
    private $isPublished;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("tache:read")
     */
    private $publishedAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("tache:read")
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsPublished(): ?\DateTimeInterface
    {
        return $this->isPublished;
    }

    public function setIsPublished(\DateTimeInterface $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
