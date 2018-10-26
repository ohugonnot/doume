<?php
// src/AppBundle/Entity/Cotisation.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="cotisation")
 */
class Cotisation
{
	use TimestampableEntity;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
	 * @var string
	 *
     * @ORM\Column(name="type", type="string", length=12)
     */
    private $type;

    /**
	 * @var int
	 *
     * @ORM\Column(name="annee", type="integer", length=4)
     */
    private $annee;

    /**
	 * @var \DateTime
	 *
     * @ORM\Column(name="debut", type="date")
     */
    private $debut;

    /**
	 * @var \DateTime
	 *
     * @ORM\Column(name="fin", type="date")
     */
    private $fin;

    /**
	 * @var float
	 *
     * @ORM\Column(name="montant", type="decimal", precision=6, scale=2)
     */
    private $montant;

    /**
	 * @var string
	 *
     * @ORM\Column(name="moyen", type="string", length=20)
     */
    private $moyen;

    /**
	 * @var bool
	 *
	 * @ORM\Column(name="recu", type="boolean", nullable=false)
     */
    private $recu;


    /**
	 * @var User
	 *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="cotisations")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
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
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return Cotisation
	 */
	public function setType(string $type)
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getAnnee(): int
	{
		return $this->annee;
	}

	/**
	 * @param int $annee
	 * @return Cotisation
	 */
	public function setAnnee(int $annee)
	{
		$this->annee = $annee;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getDebut(): \DateTime
	{
		return $this->debut;
	}

	/**
	 * @param \DateTime $debut
	 * @return Cotisation
	 */
	public function setDebut(\DateTime $debut)
	{
		$this->debut = $debut;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getFin(): \DateTime
	{
		return $this->fin;
	}

	/**
	 * @param \DateTime $fin
	 * @return Cotisation
	 */
	public function setFin(\DateTime $fin)
	{
		$this->fin = $fin;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getMontant(): float
	{
		return $this->montant;
	}

	/**
	 * @param float $montant
	 * @return Cotisation
	 */
	public function setMontant(float $montant)
	{
		$this->montant = $montant;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMoyen(): string
	{
		return $this->moyen;
	}

	/**
	 * @param string $moyen
	 * @return Cotisation
	 */
	public function setMoyen(string $moyen)
	{
		$this->moyen = $moyen;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isRecu(): bool
	{
		return $this->recu;
	}

	/**
	 * @param bool $recu
	 * @return Cotisation
	 */
	public function setRecu(bool $recu)
	{
		$this->recu = $recu;
		return $this;
	}
}