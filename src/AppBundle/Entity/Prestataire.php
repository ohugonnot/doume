<?php
// src/AppBundle/Entity/Prestataire.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="prestataire")
 */
class Prestataire
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\OneToOne(targetEntity="User", cascade={"persist"}, mappedBy="prestataire")
     */
    protected $user;
    /**
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;
    /**
     * @ORM\Column(name="raison", type="string", length=100)
     */
    private $raison;
    /**
     * @ORM\Column(name="metier", type="string", length=100)
     */
    private $metier;
    /**
     * @ORM\Column(name="statut", type="string", length=50)
     */
    private $statut;
    /**
     * @ORM\Column(name="responsable", type="string", length=200)
     */
    private $responsable;
    /**
     * @ORM\Column(name="iban", type="string", length=100)
     */
    private $iban;
    /**
     * @ORM\Column(name="siret", type="string", length=50)
     */
    private $siret;
    /**
     * @ORM\Column(name="photo", type="string", length=150)
     */
    private $photo;
    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    /**
     * @ORM\Column(name="web", type="string", length=150)
     */
    private $web;
    /**
     * @ORM\Column(name="accept", type="boolean", nullable=false)
     */
    private $accept;
    /**
     * @ORM\Column(name="partenaire", type="boolean", nullable=false)
     */
    private $partenaire;
    /**
     * @ORM\Column(name="compte", type="decimal", precision=7, scale=2)
     */
    private $compte;
    /**
     * @ORM\OneToOne(targetEntity="Geoloc", cascade={"persist"})
     */
    private $geoloc;
    /**
     * @var ArrayCollection|Rubrique[]
     * @ORM\ManyToMany(targetEntity="Rubrique", mappedBy="prestataire", cascade={"persist"}, fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="rubrique_prestataire")
     */
    private $rubriques;
    /**
     * @var ArrayCollection|Amap[]
     * @ORM\ManyToMany(targetEntity="Amap", mappedBy="prestataire", cascade={"persist"}, fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="amap_prestataire")
     */
    private $amaps;
    /**
     * @var ArrayCollection|Marche[]
     * @ORM\ManyToMany(targetEntity="Marche", mappedBy="prestataire", cascade={"persist"}, fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="marche_prestataire")
     */
    private $marches;

    /**
     * Prestataire constructor.
     */
    public function __construct()
    {
        $this->rubriques = new ArrayCollection();
        $this->amaps = new ArrayCollection();
        $this->marches = new ArrayCollection();
    }

    public function getGeoloc()
    {
        return $this->geoloc;
    }

    public function setGeoloc(Geoloc $geoloc)
    {
        $this->geoloc = $geoloc;
    }

    /**
     * @return Rubrique[]|ArrayCollection
     */
    public function getRubriques()
    {
        return $this->rubriques;
    }

    /**
     * @param Rubrique $rubrique
     * @return $this
     */
    public function addRubrique(Rubrique $rubrique)
    {
        if (!$this->rubriques->contains($rubrique)) {
            $this->rubriques[] = $rubrique;
            $rubrique->addPrestataire($this);
        }
        return $this;
    }

    /**
     * @param Rubrique $rubrique
     * @return $this
     */
    public function removeRubrique(Rubrique $rubrique)
    {
        if ($this->rubriques->contains($rubrique)) {
            $this->rubriques->removeElement($rubrique);
            $rubrique->removePrestataire($this);
        }
        return $this;
    }

    /**
     * @return Amap[]|ArrayCollection
     */
    public function getAmaps()
    {
        return $this->amaps;
    }

    /**
     * @param Amap $amap
     * @return $this
     */
    public function addAmap(Amap $amap)
    {
        if (!$this->amaps->contains($amap)) {
            $this->amaps[] = $amap;
            $amap->addPrestataire($this);
        }
        return $this;
    }

    /**
     * @param Amap $amap
     * @return $this
     */
    public function removeAmap(Amap $amap)
    {
        if ($this->amaps->contains($amap)) {
            $this->amaps->removeElement($amap);
            $amap->removePrestataire($this);
        }
        return $this;
    }


    /**
     * @return Marche[]|ArrayCollection
     */
    public function getMarches()
    {
        return $this->marches;
    }

    /**
     * @param Marche $marche
     * @return $this
     */
    public function addMarche(Marche $marche)
    {
        if (!$this->marches->contains($marche)) {
            $this->marches[] = $marche;
            $marche->addPrestataire($this);
        }
        return $this;
    }

    /**
     * @param Marche $marche
     * @return $this
     */
    public function removeMarche(Marche $marche)
    {
        if ($this->marches->contains($marche)) {
            $this->marches->removeElement($marche);
            $marche->removePrestataire($this);
        }
        return $this;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     * @return Prestataire
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRaison()
    {
        return $this->raison;
    }

    /**
     * @param mixed $raison
     * @return Prestataire
     */
    public function setRaison($raison)
    {
        $this->raison = $raison;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetier()
    {
        return $this->metier;
    }

    /**
     * @param mixed $metier
     * @return Prestataire
     */
    public function setMetier($metier)
    {
        $this->metier = $metier;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     * @return Prestataire
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * @param mixed $responsable
     * @return Prestataire
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param mixed $iban
     * @return Prestataire
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * @param mixed $siret
     * @return Prestataire
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     * @return Prestataire
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Prestataire
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * @param mixed $web
     * @return Prestataire
     */
    public function setWeb($web)
    {
        $this->web = $web;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccept()
    {
        return $this->accept;
    }

    /**
     * @param mixed $accept
     * @return Prestataire
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPartenaire()
    {
        return $this->partenaire;
    }

    /**
     * @param mixed $partenaire
     * @return Prestataire
     */
    public function setPartenaire($partenaire)
    {
        $this->partenaire = $partenaire;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * @param mixed $compte
     * @return Prestataire
     */
    public function setCompte($compte)
    {
        $this->compte = $compte;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Prestataire
     */
    public function setUser(User $user): Prestataire
    {
        $this->user = $user;
        return $this;
    }


}
