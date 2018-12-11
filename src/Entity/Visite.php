<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisiteRepository")
 */
class Visite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @ORM\OneToMany(targetEntity="App\Entity\Visiteur", mappedBy="Visite", cascade={"all"})
     */
    private $heureArrivee;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureDepart; 

    /**
     */
    private $visiteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureArrivee(): ?\DateTimeInterface
    {
        return $this->heureArrivee;
    }

    public function setHeureArrivee(\DateTimeInterface $heureArrivee): self
    {
        $this->heureArrivee = $heureArrivee;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heureDepart;
    }

    public function setHeureDepart(\DateTimeInterface $heureDepart): self
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    /**
     * Get the value of visiteur
     */ 
    public function getVisiteur()
    {
        return $this->visiteur;
    }

    /**
     * Set the value of visiteur
     *
     * @return  self
     */ 
    public function setVisiteur($visiteur)
    {
        $this->visiteur = $visiteur;

        return $this;
    }
    
}
