<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="mlc", type="string", length=30)
     */

    private $mlc;

    /**
     * @ORM\Column(name="created_at", type="date")
     */
    private $createdAt;

    /**
     * @ORM\Column(name="etat", type="boolean", nullable=false)
     */
    private $etat;

    /**
     * @ORM\Column(name="nom", type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\Column(name="prenom", type="string", length=20)
     */
    private $prenom;

    /**
     * @ORM\Column(name="adresse", type="string", length=250)
     */
    private $adresse;

    /**
     * @ORM\Column(name="cpostal", type="string", length=5)
     */
    private $cpostal;

    /**
     * @ORM\Column(name="ville", type="string", length=100)
     */
    private $ville;

    /**
     * @ORM\Column(name="mobile", type="string", length=15)
     */
    private $mobile;

    /**
     * @ORM\Column(name="tel", type="string", length=15)
     */
    private $tel;

    /**
     * @ORM\Column(name="ecompte", type="decimal", precision=7, scale=2)
     */
    private $ecompte;


    /**
     * @ORM\OneToOne(targetEntity="Prestataire", cascade={"all"}, orphanRemoval=true, inversedBy="user")
     */
    private $prestataire;


    /**
     * @var ArrayCollection|Cotisation[]
     * @ORM\OneToMany(targetEntity="Cotisation", mappedBy="user", cascade={"all"})
     */
    private $cotisations;
    /**
     * @var ArrayCollection|Annonce[]
     * @ORM\OneToMany(targetEntity="Annonce", mappedBy="user", cascade={"all"})
     */
    private $annonces;

    public function __construct()
    {
        parent::__construct();
        $this->cotisations = new ArrayCollection();
        $this->annonces = new ArrayCollection();
    }

    /**
     * @return Cotisation[]|ArrayCollection
     */
    public function getCotisations()
    {
        return $this->cotisations;
    }

    /**
     * @param Cotisation $cotisation
     * @return $this
     */
    public function addCotisation(Cotisation $cotisation)
    {
        if (!$this->cotisations->contains($cotisation)) {
            $this->cotisations[] = $cotisation;
            $cotisation->setUser($this);
        }
        return $this;
    }

    /**
     * @param Cotisation $cotisation
     * @return $this
     */
    public function removeCotisation(Cotisation $cotisation)
    {
        if ($this->cotisations->contains($cotisation)) {
            $this->cotisations->removeElement($cotisation);
            $cotisation->setUser(null);
        }
        return $this;
    }

    /**
     * @return Annonce[]|ArrayCollection
     */
    public function getAnnonces()
    {
        return $this->annonces;
    }

    /**
     * @param Annonce $annonce
     * @return $this
     */
    public function addAnnonce(Annonce $annonce)
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setUser($this);
        }
        return $this;
    }

    /**
     * @param Annonce $annonce
     * @return $this
     */
    public function removeAnnonce(Annonce $annonce)
    {
        if ($this->annonces->contains($annonce)) {
            $this->annonces->removeElement($annonce);
            $annonce->setUser(null);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     * @return User
     */
    public function setAdresse(String $adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return String
     */
    public function getMlc(): String
    {
        return $this->mlc;
    }

    /**
     * @param String $mlc
     * @return User
     */
    public function setMlc(String $mlc): User
    {
        $this->mlc = $mlc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     * @return User
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCpostal()
    {
        return $this->cpostal;
    }

    /**
     * @param mixed $cpostal
     * @return User
     */
    public function setCpostal($cpostal)
    {
        $this->cpostal = $cpostal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEcompte()
    {
        return $this->ecompte;
    }

    /**
     * @param mixed $ecompte
     * @return User
     */
    public function setEcompte($ecompte)
    {
        $this->ecompte = $ecompte;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     * @return User
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     * @return User
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPrestataire(): Bool
    {
        return $this->getPrestataire() != null;
    }

    /**
     * @return Prestataire
     */
    public function getPrestataire(): Prestataire
    {
        return $this->prestataire;
    }

    /**
     * @param Prestataire $prestataire
     * @return User
     */
    public function setPrestataire(Prestataire $prestataire): User
    {
        $this->prestataire = $prestataire;
        return $this;
    }
}
