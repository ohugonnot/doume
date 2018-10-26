<?php
// src/AppBundle/Entity/News.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;


/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="news")
 */
class News
{
	use TimestampableEntity, NameSlugContentEntityTrait, EnablableEntityTrait;

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
	 * @var User
	 *
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="news")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
	 */
	private $user;

    /**
	 * QUESTION
     * @ORM\Column(name="groupe", type="string", length=255)
     */
    private $groupe;


	/**
	 * @return int
	 */
	public function getId(): int
    {
        return $this->id;
    }

	/**
	 * @param User $user
	 * @return $this
	 */
	public function setuser(User $user)
	{
		$this->user = $user;
		return $this;
	}

	/**
	 * @return User
	 */
	public function getuser(): User
	{
		return $this->user;
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
	 * @return News
	 */
	public function setFichier(?Fichier $fichier)
	{
		$this->fichier = $fichier;
		return $this;
	}
}