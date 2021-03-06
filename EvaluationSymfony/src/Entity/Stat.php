<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatRepository")
 */
class Stat
{
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime() );
    }
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $contamined;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $healed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $zombified;

    /**
     * @ORM\Column(type="date")
     */
    private $stat_date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="stat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContamined(): ?int
    {
        return $this->contamined;
    }

    public function setContamined(?int $contamined): self
    {
        $this->contamined = $contamined;

        return $this;
    }

    public function getHealed(): ?int
    {
        return $this->healed;
    }

    public function setHealed(?int $healed): self
    {
        $this->healed = $healed;

        return $this;
    }

    public function getZombified(): ?int
    {
        return $this->zombified;
    }

    public function setZombified(?int $zombified): self
    {
        $this->zombified = $zombified;

        return $this;
    }

    public function getStatDate(): ?\DateTimeInterface
    {
        return $this->stat_date;
    }

    public function setStatDate(\DateTimeInterface $stat_date): self
    {
        $this->stat_date = $stat_date;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
