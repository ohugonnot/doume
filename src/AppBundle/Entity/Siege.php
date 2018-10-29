<?php
// src/AppBundle/Entity/Siege.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\HasCompteEntity;
use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="siege")
 */
class Siege
{
	use NameSlugContentEntityTrait,
		HasCompteEntity;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 * @var ArrayCollection|User[]
	 * @ORM\OneToMany(targetEntity="User", mappedBy="siege", cascade={"persist"})
	 */
	private $users;

	public function __construct()
	{
		$this->users = new ArrayCollection();
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return User[]|ArrayCollection
	 */
	public function getUsers()
	{
		return $this->users;
	}

	/**
	 * @param User $user
	 * @return $this
	 */
	public function addUser(User $user)
	{
		if (!$this->users->contains($user)) {
			$this->users[] = $user;
			$user->setSiege($this);
		}
		return $this;
	}

	/**
	 * @param User $user
	 * @return $this
	 */
	public function removeUser(User $user)
	{
		if ($this->users->contains($user)) {
			$this->users->removeElement($user);
			$user->setSiege(null);
		}
		return $this;
	}
}
