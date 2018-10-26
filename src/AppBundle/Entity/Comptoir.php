<?php
// src/AppBundle/Entity/Comptoir.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\ContactEmailTelTrait;
use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use AppBundle\Entity\EntityTrait\GeolocEntityTrait;
use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * QUESTION
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="comptoir")
 */
class Comptoir
{
	use NameSlugContentEntityTrait, TimestampableEntity, EnablableEntityTrait, GeolocEntityTrait, ContactEmailTelTrait;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
	 * @var integer
	 * QUESTION
     * @ORM\Column(name="compte", type="integer", length=5)
     */
    private $compte;

	/**
	 * @var null|Fichier
	 *
	 * @Assert\Valid()
	 * @ORM\OneToOne(targetEntity="Fichier", cascade={"all"}, orphanRemoval=true, fetch="EAGER")
	 */
	protected $fichier;

	/**
	 * @var User
	 *
	 * @ORM\OneToOne(targetEntity="User", cascade={"persist"}, inversedBy="comptoir")
	 */
	protected $user;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

	/**
	 * @return int
	 */
	public function getCompte(): int
	{
		return $this->compte;
	}

	/**
	 * @param int $compte
	 * @return Comptoir
	 */
	public function setCompte(int $compte)
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
	 * @return Comptoir
	 */
	public function setUser(User $user)
	{
		$this->user = $user;
		return $this;
	}

	/**
	 * @return Fichier
	 */
	public function getFichier(): ?Fichier
	{
		return $this->fichier;
	}

	/**
	 * @param Fichier $fichier
	 * @return Comptoir
	 */
	public function setFichier(?Fichier $fichier)
	{
		$this->fichier = $fichier;
		return $this;
	}
}