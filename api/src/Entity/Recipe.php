<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ApiResource(
 *     normalizationContext={"groups"={"recipe:read"}},
 *     collectionOperations={
 *         "get",
 *         "post"={"access_control"="is_granted('ROLE_USER')"}
 *     },
 *     itemOperations={
 *         "get",
 *         "put"={"access_control"="is_granted('ROLE_USER') and previous_object.owner == user",
 *          "access_control_message"="Sorry, but you are not the book owner."},
 *         "delete"={"access_control"="is_granted('ROLE_USER') and previous_object.owner == user",
 *          "access_control_message"="Sorry, but you are not the book owner."}
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *     "owner.id": "exact",
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
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"recipe:read"})
     * @Assert\NotBlank
     */
    private $prepTime;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"recipe:read"})
     * @Assert\NotBlank
     */
    private $cookTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="json_document", options={"jsonb": true}, nullable=false)
     * @Groups({"recipe:read"})
     * @Assert\NotBlank
     */
    private $ingredients;

    /**
     * @ORM\Column(type="json_document", options={"jsonb": true}, nullable=false)
     * @Groups({"recipe:read"})
     */
    private $steps;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="recipes")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"recipe:read"})
     */
    public $owner;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Users", mappedBy="likes")
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

    public function getOwner(): ?Users
    {
        return $this->owner;
    }

    public function setOwner(?Users $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getLikers(): Collection
    {
        return $this->likers;
    }

    public function addLiker(Users $liker): self
    {
        if (!$this->likers->contains($liker)) {
            $this->likers[] = $liker;
            $liker->addLike($this);
        }

        return $this;
    }

    public function removeLiker(Users $liker): self
    {
        if ($this->likers->contains($liker)) {
            $this->likers->removeElement($liker);
            $liker->removeLike($this);
        }

        return $this;
    }
}
