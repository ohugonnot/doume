<?php
// src/AppBundle/Entity/Annonce.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use AppBundle\Entity\EntityTrait\TimestampableEntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="annonce")
 */
class Annonce
{
	use TimestampableEntityTrait, NameSlugContentEntityTrait, EnablableEntityTrait;

	const UPLOAD_DIR = "annonce";

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
	 * @var float
	 *
     * @ORM\Column(name="prix", type="decimal", precision=6, scale=2)
     */
    private $prix;

	/**
	 * @var ArrayCollection|Rubrique[]
	 *
	 * @ORM\ManyToMany(targetEntity="Rubrique", mappedBy="annonces", cascade={"persist"}, fetch="EXTRA_LAZY")
	 * @ORM\JoinTable(name="rubrique_annonce")
	 */
	private $rubriques;

    /**
	 * @var User
	 *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="annonces", cascade={"persist"})
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

	/**
	 * @var null|Fichier
	 *
	 * @Assert\Valid()
	 * @ORM\OneToOne(targetEntity="Fichier", cascade={"all"}, orphanRemoval=true, fetch="EAGER")
	 */
	protected $fichier;

	public function __construct()
	{
		$this->rubriques = new ArrayCollection();
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
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
			$rubrique->addAnnonce($this);
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
			$rubrique->removeAnnonce($this);
		}
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
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

	/**
	 * @return float
	 */
	public function getPrix(): float
	{
		return $this->prix;
	}

	/**
	 * @param float $prix
	 * @return Annonce
	 */
	public function setPrix(float $prix)
	{
		$this->prix = $prix;
		return $this;
	}

	/**
	 * @return null|Fichier
	 */
	public function getFichier(): ?Fichier
	{
		return $this->fichier;
	}

	/**
	 * @param Fichier $fichier
	 * @return Annonce
	 */
	public function setFichier(Fichier $fichier)
	{
		$fichier->setType(self::UPLOAD_DIR);
		$this->fichier = $fichier;
		return $this;
	}
}
