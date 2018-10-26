<?php
// src/AppBundle/Entity/Groupe.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\Group as BaseGroup;

/**
 * @ORM\Entity
 * @ORM\Table(name="groupe")
 */
class Groupe extends BaseGroup
{
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
	 *
	 * @ORM\ManyToMany(targetEntity="User", inversedBy="groups", cascade={"persist"}, fetch="EXTRA_LAZY")
	 */
	private $users;


    /**
	 * QUESTION
     * @ORM\Column(name="compte", type="integer", length=5)
     */
    //private $compte;


	public function __construct(string $name, array $roles = array())
	{
		$this->users = new ArrayCollection();

		parent::__construct($name, $roles);
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
			$user->addGroup($this);
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
			$user->removeGroup($this);
		}
		return $this;
	}
}
