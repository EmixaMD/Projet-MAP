<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisiteurRepository")
 */
class Visiteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $societe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zoneVisite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marqueVehicule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $immatriculation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cni;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idUnique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dateNaissance;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroRue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rue;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employe", inversedBy="visiteur", cascade={"all"})
     * 
     */
    private $employe; 

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LieuVisite", inversedBy="visiteur", cascade={"all"})
     */
    private $lieuVisite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MotifVisite", inversedBy="visiteur", cascade={"all"})
     */
    private $motifVisite;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getZoneVisite(): ?string
    {
        return $this->zoneVisite;
    }

    public function setZoneVisite(string $zoneVisite): self
    {
        $this->zoneVisite = $zoneVisite;

        return $this;
    }

    public function getMarqueVehicule(): ?string
    {
        return $this->marqueVehicule;
    }

    public function setMarqueVehicule(string $marqueVehicule): self
    {
        $this->marqueVehicule = $marqueVehicule;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getCni(): ?string
    {
        return $this->cni;
    }

    public function setCni(?string $cni): self
    {
        $this->cni = $cni;

        return $this;
    }

    public function getIdUnique(): ?string
    {
        return $this->idUnique;
    }

    public function setIdUnique(string $idUnique): self
    {
        $this->idUnique = $idUnique;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }


    public function getdateNaissance(): ?int
    {
        return $this->dateNaissance;
    }

    public function setdateNaissance(?int $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;


         return $this;
     }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(?int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getNumeroRue(): ?string
    {
        return $this->numeroRue;
    }

    public function setNumeroRue(?string $numeroRue): self
    {
        $this->numeroRue = $numeroRue;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    

    /**
     * Get the value of employe
     */ 
    public function getEmploye()
    {
        return $this->employe;
    }

    /**
     * Set the value of employe
     *
     * @return  self
     */ 
    public function setEmploye($employe)
    {
        $this->employe = $employe;

        return $this;
    }

    /**
     * Get the value of lieuVisite
     */ 
    public function getLieuVisite()
    {
        return $this->lieuVisite;
    }

    /**
     * Set the value of lieuVisite
     *
     * @return  self
     */ 
    public function setLieuVisite($lieuVisite)
    {
        $this->lieuVisite = $lieuVisite;

        return $this;
    }

    /**
     * Get the value of motifVisite
     */ 
    public function getMotifVisite()
    {
        return $this->motifVisite;
    }

    /**
     * Set the value of motifVisite
     *
     * @return  self
     */ 
    public function setMotifVisite($motifVisite)
    {
        $this->motifVisite = $motifVisite;

        return $this;
    }
}
