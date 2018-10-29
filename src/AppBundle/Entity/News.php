<?php
// src/AppBundle/Entity/News.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="news")
 */
class News
{
	use TimestampableEntity,
		NameSlugContentEntityTrait,
		EnablableEntityTrait;

	const UPLOAD_DIR = "news";

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
	 * @var bool
	 *
	 * @ORM\Column(type="boolean", name="visible_by_all_groups")
	 */
	private $visibleByAllGroups = true;

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
		$fichier->setType(self::UPLOAD_DIR);
		$this->fichier = $fichier;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isVisibleByAllGroups(): bool
	{
		return $this->visibleByAllGroups;
	}

	/**
	 * @param bool $visibleByAllGroups
	 * @return News
	 */
	public function setVisibleByAllGroups(bool $visibleByAllGroups)
	{
		$this->visibleByAllGroups = $visibleByAllGroups;
		return $this;
	}
}