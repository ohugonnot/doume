<?php
// src/AppBundle/Entity/Prestataire.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use AppBundle\Entity\EntityTrait\GeolocEntityTrait;
use AppBundle\Entity\EntityTrait\HasCompteEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="prestataire")
 */
class Prestataire
{
	use	EnablableEntityTrait,
		GeolocEntityTrait,
		HasCompteEntity;

	const UPLOAD_DIR = "prestataire";

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
	 * @var string
	 *
     * @ORM\Column(name="raison", type="string", length=100)
     */
    private $raison;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="metier", type="string", length=100)
     */
    private $metier;

	/**
	 * @var null|string
	 *
	 * @ORM\Column(name="statut", type="string", length=50, nullable=true)
     */
    private $statut;

	/**
	 * @var null|string
	 *
	 * @ORM\Column(name="responsable", type="string", length=200, nullable=true)
     */
    private $responsable;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="iban", type="string", length=100)
     */
    private $iban;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="siret", type="string", length=50)
     */
    private $siret;

	/**
	 * @var null|string
	 *
	 * @ORM\Column(name="web", type="string", length=255, nullable=true)
     */
    private $web;

	/**
	 * @var bool
	 *
	 * @ORM\Column(name="accept", type="boolean", nullable=false)
     */
    private $accept = false;

	/**
	 * @var bool
	 *
	 * @ORM\Column(name="partenaire", type="boolean", nullable=false)
     */
    private $partenaire = false;

	/**
	 * @var null|Image
	 *
	 * @Assert\Valid()
	 * @ORM\OneToOne(targetEntity="Image", cascade={"all"}, orphanRemoval=true, fetch="EAGER")
	 */
	private $image;

	/**
	 * @var User
	 *
	 * @ORM\OneToOne(targetEntity="User", cascade={"persist"}, inversedBy="prestataire")
	 */
	protected $user;

    /**
     * @var ArrayCollection|Rubrique[]
     * @ORM\ManyToMany(targetEntity="Rubrique", mappedBy="prestataires", cascade={"persist"}, fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="rubrique_prestataire")
     */
    private $rubriques;

    /**
     * @var ArrayCollection|Amap[]
     * @ORM\ManyToMany(targetEntity="Amap", mappedBy="prestataires", cascade={"persist"}, fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="amap_prestataire")
     */
    private $amaps;

    /**
     * @var ArrayCollection|Marche[]
	 *
     * @ORM\ManyToMany(targetEntity="Marche", mappedBy="prestataires", cascade={"persist"}, fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="marche_prestataire")
     */
    private $marches;

	/**
	 * @var ArrayCollection|Promo[]
	 * @ORM\OneToMany(targetEntity="Promo", mappedBy="prestataire", cascade={"all"}, orphanRemoval=true)
	 */
	private $promos;

	/**
	 * @var Groupe $prestataireGroup
	 *
	 * @ORM\ManyToOne(targetEntity="Groupe", inversedBy="prestataires")
	 */
	private $prestataireGroup;

    public function __construct()
    {
        $this->rubriques = new ArrayCollection();
        $this->amaps = new ArrayCollection();
        $this->marches = new ArrayCollection();
        $this->promos = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

	/**
	 * @return string
	 */
	public function getRaison(): string
	{
		return $this->raison;
	}

	/**
	 * @param string $raison
	 * @return Prestataire
	 */
	public function setRaison(string $raison)
	{
		$this->raison = $raison;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMetier(): string
	{
		return $this->metier;
	}

	/**
	 * @param string $metier
	 * @return Prestataire
	 */
	public function setMetier(string $metier)
	{
		$this->metier = $metier;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getStatut(): ?string
	{
		return $this->statut;
	}

	/**
	 * @param null|string $statut
	 * @return Prestataire
	 */
	public function setStatut(?string $statut)
	{
		$this->statut = $statut;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getResponsable(): ?string
	{
		return $this->responsable;
	}

	/**
	 * @param null|string $responsable
	 * @return Prestataire
	 */
	public function setResponsable(?string $responsable)
	{
		$this->responsable = $responsable;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getIban(): string
	{
		return $this->iban;
	}

	/**
	 * @param string $iban
	 * @return Prestataire
	 */
	public function setIban(string $iban)
	{
		$this->iban = $iban;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSiret(): string
	{
		return $this->siret;
	}

	/**
	 * @param string $siret
	 * @return Prestataire
	 */
	public function setSiret(string $siret)
	{
		$this->siret = $siret;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getWeb(): ?string
	{
		return $this->web;
	}

	/**
	 * @param null|string $web
	 * @return Prestataire
	 */
	public function setWeb(?string $web)
	{
		$this->web = $web;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isAccept(): bool
	{
		return $this->accept;
	}

	/**
	 * @param bool $accept
	 * @return Prestataire
	 */
	public function setAccept(bool $accept)
	{
		$this->accept = $accept;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isPartenaire(): bool
	{
		return $this->partenaire;
	}

	/**
	 * @param bool $partenaire
	 * @return Prestataire
	 */
	public function setPartenaire(bool $partenaire)
	{
		$this->partenaire = $partenaire;
		return $this;
	}

	/**
	 * @return Image|null
	 */
	public function getImage(): ?Image
	{
		return $this->image;
	}

	/**
	 * @param Image|null $image
	 * @return Prestataire
	 */
	public function setImage(?Image $image)
	{
		$image->setType(self::UPLOAD_DIR);
		$this->image = $image;
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
	 * @return Promo[]|ArrayCollection
	 */
	public function getPromos()
	{
		return $this->promos;
	}

	/**
	 * @param Promo $promo
	 * @return $this
	 */
	public function addPromo(Promo $promo)
	{
		if (!$this->promos->contains($promo)) {
			$this->promos[] = $promo;
			$promo->setPrestataire($this);
		}
		return $this;
	}

	/**
	 * @param Promo $promo
	 * @return $this
	 */
	public function removePromo(Promo $promo)
	{
		if ($this->promos->contains($promo)) {
			$this->promos->removeElement($promo);
		}
		return $this;
	}

	/**
	 * @param null|Groupe $prestataireGroup
	 * @return $this
	 */
	public function setPrestataireGroup(?Groupe $prestataireGroup)
	{
		$this->prestataireGroup = $prestataireGroup;
		return $this;
	}

	/**
	 * @return null|Groupe
	 */
	public function getPrestataireGroup(): ?Groupe
	{
		return $this->prestataireGroup;
	}
}
