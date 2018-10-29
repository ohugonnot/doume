<?php
// src/AppBundle/Entity/Comptoir.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\ContactEmailTelTrait;
use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use AppBundle\Entity\EntityTrait\GeolocEntityTrait;
use AppBundle\Entity\EntityTrait\HasCompteEntity;
use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="comptoir")
 */
class Comptoir
{
	use NameSlugContentEntityTrait,
		TimestampableEntity,
		EnablableEntityTrait,
		GeolocEntityTrait,
		ContactEmailTelTrait,
		HasCompteEntity;

	const UPLOAD_DIR = "comptoir";

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

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
		$fichier->setType(self::UPLOAD_DIR);
		$this->fichier = $fichier;
		return $this;
	}
}