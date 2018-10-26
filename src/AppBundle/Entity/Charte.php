<?php
// src/AppBundle/Entity/Charte.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="charte")
 */
class Charte
{
	use NameSlugContentEntityTrait;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

	/**
	 * @var null|Image
	 *
	 * @Assert\Valid()
	 * @ORM\OneToOne(targetEntity="Image", cascade={"all"}, orphanRemoval=true, fetch="EAGER")
	 */
    private $image;

	/**
	 * @var null|Fichier
	 *
	 * @Assert\Valid()
	 * @ORM\OneToOne(targetEntity="Fichier", cascade={"all"}, orphanRemoval=true, fetch="EAGER")
	 */
	protected $fichier;

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
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
	 * @return Charte
	 */
	public function setImage(?Image $image)
	{
		$this->image = $image;
		return $this;
	}

	/**
	 * @return Fichier|null
	 */
	public function getFichier(): ?Fichier
	{
		return $this->fichier;
	}

	/**
	 * @param Fichier|null $fichier
	 * @return Charte
	 */
	public function setFichier(?Fichier $fichier)
	{
		$this->fichier = $fichier;
		return $this;
	}
}