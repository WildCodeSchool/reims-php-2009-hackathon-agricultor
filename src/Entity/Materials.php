<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MaterialsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=MaterialsRepository::class)
 */
class Materials
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $Type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $Trademark;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $Model;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $Year;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $Kilometers;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="materials")
     */
    private Collection $Owner;

    public function __construct()
    {
        $this->Owner = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getTrademark(): ?string
    {
        return $this->Trademark;
    }

    public function setTrademark(string $Trademark): self
    {
        $this->Trademark = $Trademark;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(string $Model): self
    {
        $this->Model = $Model;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->Year;
    }

    public function setYear(int $Year): self
    {
        $this->Year = $Year;

        return $this;
    }

    public function getKilometers(): ?int
    {
        return $this->Kilometers;
    }

    public function setKilometers(int $Kilometers): self
    {
        $this->Kilometers = $Kilometers;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getOwner(): Collection
    {
        return $this->Owner;
    }

    public function addOwner(User $owner): self
    {
        if (!$this->Owner->contains($owner)) {
            $this->Owner[] = $owner;
            $owner->setMaterials($this);
        }

        return $this;
    }

    public function removeOwner(User $owner): self
    {
        if ($this->Owner->removeElement($owner)) {
            // set the owning side to null (unless already changed)
            if ($owner->getMaterials() === $this) {
                $owner->setMaterials(null);
            }
        }

        return $this;
    }
}
