<?php
// src/AppBundle/Entity/Suivi.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * QUESTION
 * @ORM\Entity
 * @ORM\Table(name="suivi")
 */
class Suivi
{
	use TimestampableEntity,
		EnablableEntityTrait;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 * @var null|string
	 *
     * @ORM\Column(name="prospect", type="string", length=255, nullable=true)
     */
    private $prospect;

	/**
	 * @var null|string
	 *
     * @ORM\Column(name="lieu", type="string", length=255, length=255, nullable=true)
     */
    private $lieu;

	/**
	 * @var null|string
	 *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

	/**
	 * @var User
	 *
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="liens")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
	 */
	private $user;

	/**
	 * @return int
	 */
	public function getId(): int
    {
        return $this->id;
    }

	/**
	 * @return null|string
	 */
	public function getProspect(): ?string
	{
		return $this->prospect;
	}

	/**
	 * @param null|string $prospect
	 * @return Suivi
	 */
	public function setProspect(?string $prospect)
	{
		$this->prospect = $prospect;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getLieu(): ?string
	{
		return $this->lieu;
	}

	/**
	 * @param null|string $lieu
	 * @return Suivi
	 */
	public function setLieu(?string $lieu)
	{
		$this->lieu = $lieu;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCommentaire(): ?string
	{
		return $this->commentaire;
	}

	/**
	 * @param null|string $commentaire
	 * @return Suivi
	 */
	public function setCommentaire(?string $commentaire)
	{
		$this->commentaire = $commentaire;
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
	 * @return Suivi
	 */
	public function setUser(User $user)
	{
		$this->user = $user;
		return $this;
	}
}