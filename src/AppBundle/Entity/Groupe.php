<?php
// src/AppBundle/Entity/Groupe.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\HasCompteEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\Group as BaseGroup;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="groupe")
 */
class Groupe extends BaseGroup
{
	use HasCompteEntity;

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
	 * @var ArrayCollection|User[]
	 * @ORM\OneToMany(targetEntity="User", mappedBy="myGroup", cascade={"persist"})
	 */
	private $gestionnaires;

	public function __construct(string $name, array $roles = array())
	{
		$this->users = new ArrayCollection();
		$this->gestionnaires = new ArrayCollection();

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

	/**
	 * @return User[]|ArrayCollection
	 */
	public function getGestionnaires()
	{
		return $this->gestionnaires;
	}

	/**
	 * @param User $gestionnaire
	 * @return $this
	 */
	public function addGestionnaire(User $gestionnaire)
	{
		if (!$this->gestionnaires->contains($gestionnaire)) {
			$this->gestionnaires[] = $gestionnaire;
			$gestionnaire->setMyGroup($this);
		}
		return $this;
	}

	/**
	 * @param User $gestionnaire
	 * @return $this
	 */
	public function removeGestionnaire(User $gestionnaire)
	{
		if ($this->gestionnaires->contains($gestionnaire)) {
			$this->gestionnaires->removeElement($gestionnaire);
			$gestionnaire->setMyGroup(null);
		}
		return $this;
	}

}
