<?php
// src/AppBundle/Entity/Faq.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use AppBundle\Entity\EntityTrait\TimestampableEntityTrait;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="faq")
 */
class Faq
{
	use TimestampableEntityTrait, EnablableEntityTrait;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
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
	 * @var null|User
	 *
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="faqs", cascade={"persist"})
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
	 */
	private $user;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

	/**
	 * @return null|User
	 */
	public function getUser(): ?User
	{
		return $this->user;
	}

	/**
	 * @param null|User $user
	 * @return $this
	 */
	public function setUser(?User $user)
	{
		$this->user = $user;
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
	 * @return Faq
	 */
	public function setFichier(?Fichier $fichier)
	{
		$this->fichier = $fichier;
		return $this;
	}
}