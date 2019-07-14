<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity()
 * @ApiResource(
 *      normalizationContext={"groups"={"recipe:read"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *     "owner.username": "partial"
 * })
 */
class Recipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"user:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"recipe:read", "user:read"})
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"recipe:read"})
     */
    private $prepTime;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"recipe:read"})
     */
    private $cookTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="json_document", options={"jsonb": true}, nullable=false)
     * @Groups({"recipe:read"})
     */
    private $ingredients;

    /**
     * @ORM\Column(type="json_document", options={"jsonb": true}, nullable=false)
     * @Groups({"recipe:read"})
     */
    private $steps;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="recipes")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"recipe:read"})
     */
    private $owner;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", mappedBy="likes")
     * @Groups({"recipe:read"})
     */
    private $likers;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->likers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrepTime(): ?int
    {
        return $this->prepTime;
    }

    public function setPrepTime(int $prepTime): self
    {
        $this->prepTime = $prepTime;

        return $this;
    }

    public function getCookTime(): ?int
    {
        return $this->cookTime;
    }

    public function setCookTime(int $cookTime): self
    {
        $this->cookTime = $cookTime;

        return $this;
    }

    /**
     * @Groups({"recipe:read"})
     *
     * @return integer
     */
    public function getTotalTime(): int
    {
        return $this->prepTime + $this->cookTime;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getSteps()
    {
        return $this->steps;
    }

    public function setSteps($steps)
    {
        $this->steps = $steps;

        return $this;
    }

    public function getOwner(): ?Utilisateur
    {
        return $this->owner;
    }

    public function setOwner(?Utilisateur $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getLikers(): Collection
    {
        return $this->likers;
    }

    public function addLiker(Utilisateur $liker): self
    {
        if (!$this->likers->contains($liker)) {
            $this->likers[] = $liker;
            $liker->addLike($this);
        }

        return $this;
    }

    public function removeLiker(Utilisateur $liker): self
    {
        if ($this->likers->contains($liker)) {
            $this->likers->removeElement($liker);
            $liker->removeLike($this);
        }

        return $this;
    }
}
