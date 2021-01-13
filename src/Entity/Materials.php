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
    private ?string $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $trademark;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $model;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $year;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $kilometer;

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
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTrademark(): ?string
    {
        return $this->trademark;
    }

    public function setTrademark(string $trademark): self
    {
        $this->trademark = $trademark;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getKilometer(): ?int
    {
        return $this->kilometer;
    }

    public function setKilometer(int $kilometer): self
    {
        $this->kilometer = $kilometer;

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
